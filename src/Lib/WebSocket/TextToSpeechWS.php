<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

use Telnyx\Client;

/**
 * WebSocket client for Text-to-Speech streaming synthesis.
 *
 * This class provides real-time text-to-speech synthesis using the
 * Telnyx WebSocket API.
 *
 * @example
 * ```php
 * $client = new \Telnyx\Client();
 * $ws = new TextToSpeechWS($client, new TextToSpeechStreamParams([
 *     'voice' => 'Telnyx.Allison',
 *     'output_format' => 'mp3',
 * ]));
 *
 * $ws->on('audio_chunk', function(TtsServerEvent $event) {
 *     $audioBytes = $event->getAudioBytes();
 *     // Handle audio chunk
 * });
 *
 * $ws->on('error', function(TtsServerEvent $event) {
 *     echo "Error: {$event->error}\n";
 * });
 *
 * $ws->waitForOpen();
 * $ws->send(StreamClientEvent::text('Hello, world!', true));
 * ```
 */
class TextToSpeechWS
{
    /**
     * The Telnyx client.
     */
    protected Client $client;

    /**
     * Stream parameters.
     */
    protected ?TextToSpeechStreamParams $params;

    /**
     * The underlying WebSocket client.
     */
    protected WebSocketClient $socket;

    /**
     * Event listeners.
     *
     * @var array<string, array<callable>>
     */
    protected array $listeners = [];

    /**
     * Whether the connection is open.
     */
    protected bool $isOpen = false;

    /**
     * @param Client $client Telnyx client
     * @param TextToSpeechStreamParams|null $params Stream parameters
     */
    public function __construct(Client $client, ?TextToSpeechStreamParams $params = null)
    {
        $this->client = $client;
        $this->params = $params;
        $this->socket = $this->createSocket();
    }

    /**
     * Wait for the connection to be established.
     *
     * @param int $timeout Timeout in seconds
     *
     * @throws WebSocketError
     */
    public function waitForOpen(int $timeout = 30): void
    {
        if ($this->isOpen) {
            return;
        }

        $this->socket->connect();
        $this->isOpen = true;
    }

    /**
     * Send an event to the server for synthesis.
     *
     * @param StreamClientEvent $event Client event
     *
     * @throws WebSocketError
     */
    public function send(StreamClientEvent $event): void
    {
        if (!$this->isOpen) {
            throw new WebSocketError('WebSocket is not open. Call waitForOpen() first.');
        }

        $this->socket->send($event->toJson(), false);
    }

    /**
     * Send text to the server for synthesis (convenience method).
     *
     * @param string $text Text to synthesize
     * @param bool $isFinal Whether this is the final text
     *
     * @throws WebSocketError
     */
    public function sendText(string $text, bool $isFinal = false): void
    {
        $this->send(StreamClientEvent::text($text, $isFinal));
    }

    /**
     * Send a flush event to request audio output.
     *
     * @throws WebSocketError
     */
    public function flush(): void
    {
        $this->send(StreamClientEvent::flush());
    }

    /**
     * Process incoming messages (call this in a loop for real-time processing).
     *
     * @param int|null $timeout Timeout in seconds for receiving
     */
    public function poll(?int $timeout = 1): ?TtsServerEvent
    {
        if (!$this->isOpen) {
            return null;
        }

        $message = $this->socket->receive($timeout);

        if (null === $message) {
            return null;
        }

        return $this->handleMessage($message);
    }

    /**
     * Process incoming messages until the connection closes.
     *
     * Returns a generator that yields TtsStreamMessage objects representing
     * WebSocket lifecycle and message events.
     *
     * @return \Generator<TtsStreamMessage>
     */
    public function stream(): \Generator
    {
        // Yield initial state
        if (!$this->isOpen) {
            yield new TtsStreamMessage('connecting');
            $this->waitForOpen();
        }

        yield new TtsStreamMessage('open');

        while ($this->isOpen) {
            $event = $this->poll();

            if (null !== $event) {
                if ($event->isError()) {
                    yield new TtsStreamMessage(
                        'error',
                        null,
                        new WebSocketError($event->error ?? 'Unknown error', $event->rawData)
                    );

                    break;
                }

                yield new TtsStreamMessage('message', $event);

                if ($event->isFinalEvent()) {
                    break;
                }
            }
        }

        yield new TtsStreamMessage('close');
    }

    /**
     * Close the WebSocket connection.
     *
     * @param int $code Close code
     * @param string $reason Close reason
     */
    public function close(int $code = 1000, string $reason = 'OK'): void
    {
        $this->socket->close($code, $reason);
        $this->isOpen = false;
    }

    /**
     * Check if the WebSocket is open.
     */
    public function isOpen(): bool
    {
        return $this->isOpen;
    }

    /**
     * Register an event listener.
     *
     * Events:
     * - 'event': All server events
     * - 'audio_chunk': Audio chunk events
     * - 'final': Final events
     * - 'error': Error events
     *
     * @param string $event Event name
     * @param callable $callback Callback function
     */
    public function on(string $event, callable $callback): self
    {
        if (!isset($this->listeners[$event])) {
            $this->listeners[$event] = [];
        }
        $this->listeners[$event][] = $callback;

        return $this;
    }

    /**
     * Remove an event listener.
     *
     * @param string $event Event name
     * @param callable $callback Callback function
     */
    public function off(string $event, callable $callback): self
    {
        if (isset($this->listeners[$event])) {
            $this->listeners[$event] = array_filter(
                $this->listeners[$event],
                fn ($cb) => $cb !== $callback
            );
        }

        return $this;
    }

    /**
     * Get the WebSocket URL.
     */
    public function getUrl(): string
    {
        return $this->socket->getUrl();
    }

    /**
     * Create the WebSocket client with configured URL and headers.
     */
    protected function createSocket(): WebSocketClient
    {
        $url = $this->buildUrl();
        $headers = $this->buildHeaders();

        $socket = new WebSocketClient($url, $headers);

        // Set up internal event handling
        $socket->on('open', function () {
            $this->isOpen = true;
        });

        $socket->on('close', function () {
            $this->isOpen = false;
        });

        $socket->on('error', function (WebSocketError $error) {
            $this->handleError(null, $error->getMessage(), $error);
        });

        return $socket;
    }

    /**
     * Build the WebSocket URL.
     */
    protected function buildUrl(): string
    {
        // Get base URL
        $baseUrl = 'https://api.telnyx.com/v2';

        // Build URL
        $url = $baseUrl.'/text-to-speech/speech';

        if (null !== $this->params) {
            $queryString = $this->params->toQueryString();
            if ($queryString) {
                $url .= '?'.$queryString;
            }
        }

        // Convert to wss://
        return str_replace(['https://', 'http://'], ['wss://', 'ws://'], $url);
    }

    /**
     * Build the connection headers.
     *
     * @return array<string, string>
     */
    protected function buildHeaders(): array
    {
        $headers = [];

        if ($this->client->apiKey) {
            $headers['Authorization'] = 'Bearer '.$this->client->apiKey;
        }

        return $headers;
    }

    /**
     * Handle an incoming message.
     *
     * @param string $message Raw message
     */
    protected function handleMessage(string $message): TtsServerEvent
    {
        try {
            $event = TtsServerEvent::fromJson($message);
        } catch (\JsonException $e) {
            $this->handleError(null, 'Could not parse WebSocket event', $e);
            $event = new TtsServerEvent([
                'type' => 'error',
                'error' => 'Could not parse WebSocket event: '.$e->getMessage(),
            ]);
        }

        // Emit generic event
        $this->emit('event', $event);

        // Emit typed event
        if ($event->isError()) {
            $this->handleError($event);
        } else {
            $this->emit($event->type, $event);
        }

        return $event;
    }

    /**
     * Emit an event to all listeners.
     *
     * @param string $event Event name
     * @param mixed ...$args Event arguments
     */
    protected function emit(string $event, mixed ...$args): void
    {
        if (isset($this->listeners[$event])) {
            foreach ($this->listeners[$event] as $callback) {
                $callback(...$args);
            }
        }
    }

    /**
     * Handle an error.
     *
     * @param TtsServerEvent|null $event Error event from server
     * @param string|null $message Error message
     * @param \Throwable|null $cause Original exception
     */
    protected function handleError(
        ?TtsServerEvent $event,
        ?string $message = null,
        ?\Throwable $cause = null
    ): void {
        $errorMessage = $message ?? $event?->error ?? 'Unknown error';

        if (!isset($this->listeners['error']) || empty($this->listeners['error'])) {
            // No error listener - throw exception
            throw new WebSocketError(
                $errorMessage."\n\nTo handle errors, bind an error callback: \$ws->on('error', function(\$event) { ... })",
                $event?->rawData,
                $cause
            );
        }

        $error = new WebSocketError($errorMessage, $event?->rawData, $cause);
        $this->emit('error', $error);
    }
}
