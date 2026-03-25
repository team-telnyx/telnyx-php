<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

use Ratchet\Client\Connector;
use Ratchet\Client\WebSocket;
use Ratchet\RFC6455\Messaging\MessageInterface;
use React\EventLoop\Loop;
use React\EventLoop\LoopInterface;
use React\Promise\Deferred;

/**
 * Base WebSocket client with event handling.
 *
 * This class wraps the ratchet/pawl library and provides an event-based
 * interface similar to the TypeScript SDK.
 */
class WebSocketClient
{
    /**
     * The underlying WebSocket connection.
     */
    protected ?WebSocket $socket = null;

    /**
     * The WebSocket URL.
     */
    protected string $url;

    /**
     * Connection state.
     */
    protected bool $connected = false;

    /**
     * Event listeners.
     *
     * @var array<string, array<callable>>
     */
    protected array $listeners = [];

    /**
     * Headers to send with the connection.
     *
     * @var array<string, string>
     */
    protected array $headers = [];

    /**
     * Connection timeout in seconds.
     */
    protected int $timeout = 30;

    /**
     * The event loop.
     */
    protected LoopInterface $loop;

    /**
     * Message queue for synchronous receive.
     *
     * @var array<string>
     */
    protected array $messageQueue = [];

    /**
     * Whether the connection is closing.
     */
    protected bool $closing = false;

    /**
     * @param string $url WebSocket URL
     * @param array<string, string> $headers Connection headers
     * @param int $timeout Connection timeout in seconds
     */
    public function __construct(string $url, array $headers = [], int $timeout = 30)
    {
        $this->url = $url;
        $this->headers = $headers;
        $this->timeout = $timeout;
        $this->loop = Loop::get();
    }

    /**
     * Connect to the WebSocket server.
     *
     * @throws WebSocketError
     */
    public function connect(): void
    {
        if ($this->connected) {
            return;
        }

        $connector = new Connector($this->loop);
        $deferred = new Deferred;
        $connected = false;

        $connector($this->url, [], $this->headers)->then(
            function (WebSocket $conn) use (&$connected, $deferred) {
                $this->socket = $conn;
                $this->connected = true;
                $connected = true;

                $conn->on('message', function (MessageInterface $msg) {
                    $this->messageQueue[] = (string) $msg;
                    $this->emit('message', (string) $msg);
                });

                $conn->on('close', function ($code = null, $reason = null) {
                    $this->connected = false;
                    $this->emit('close', $code, $reason);
                });

                $this->emit('open');
                $deferred->resolve(true);
            },
            function (\Exception $e) use ($deferred) {
                $error = new WebSocketError(
                    'Failed to connect to WebSocket: '.$e->getMessage(),
                    null,
                    $e
                );
                $this->emit('error', $error);
                $deferred->reject($error);
            }
        );

        // Run the loop until connected or timeout
        $startTime = time();
        while (!$connected && (time() - $startTime) < $this->timeout) {
            $this->loop->run();
            if ($connected) {
                break;
            }
            // Small sleep to prevent busy loop
            usleep(10000);
        }

        if (!$connected) {
            throw new WebSocketError('Connection timeout');
        }
    }

    /**
     * Send data over the WebSocket.
     *
     * @param string $data Data to send
     * @param bool $binary Whether to send as binary
     *
     * @throws WebSocketError
     */
    public function send(string $data, bool $binary = false): void
    {
        if (!$this->connected || null === $this->socket) {
            throw new WebSocketError('WebSocket is not connected');
        }

        $this->socket->send($data);
    }

    /**
     * Receive a message from the WebSocket.
     *
     * @param int|null $timeout Timeout in seconds (null for default)
     *
     * @return string|null The received message or null if timeout
     *
     * @throws WebSocketError
     */
    public function receive(?int $timeout = null): ?string
    {
        if (!$this->connected || null === $this->socket) {
            throw new WebSocketError('WebSocket is not connected');
        }

        // Check queue first
        if (!empty($this->messageQueue)) {
            return array_shift($this->messageQueue);
        }

        // Run loop to receive message
        $timeout = $timeout ?? 1;
        $startTime = time();

        while (empty($this->messageQueue) && (time() - $startTime) < $timeout) {
            $this->loop->run();
            if (!empty($this->messageQueue)) {
                break;
            }
            usleep(10000);
        }

        if (!empty($this->messageQueue)) {
            return array_shift($this->messageQueue);
        }

        return null;
    }

    /**
     * Close the WebSocket connection.
     *
     * @param int $code Close code
     * @param string $reason Close reason
     */
    public function close(int $code = 1000, string $reason = 'OK'): void
    {
        if (null !== $this->socket && $this->connected) {
            $this->closing = true;

            try {
                $this->socket->close($code, $reason);
            } catch (\Throwable $e) {
                // Ignore close errors
            }
        }

        $this->connected = false;
        $this->socket = null;
        $this->emit('close', $code, $reason);
    }

    /**
     * Register an event listener.
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
     * Check if the WebSocket is connected.
     */
    public function isConnected(): bool
    {
        return $this->connected;
    }

    /**
     * Get the WebSocket URL.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Get the event loop.
     */
    public function getLoop(): LoopInterface
    {
        return $this->loop;
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
     * Check if there are listeners for an event.
     *
     * @param string $event Event name
     */
    protected function hasListeners(string $event): bool
    {
        return !empty($this->listeners[$event]);
    }
}
