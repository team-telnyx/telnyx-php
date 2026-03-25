<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

/**
 * Client event to send to Text-to-Speech WebSocket.
 */
class StreamClientEvent
{
    /**
     * Event type: "text", "flush", or "close".
     */
    public string $type;

    /**
     * Text content to synthesize (for text events).
     */
    public ?string $text;

    /**
     * Whether this is the final text chunk.
     */
    public ?bool $isFinal;

    /**
     * Additional parameters.
     *
     * @var array<string, mixed>
     */
    public array $params;

    /**
     * @param string $type Event type
     * @param string|null $text Text content
     * @param bool|null $isFinal Whether final
     * @param array<string, mixed> $params Additional parameters
     */
    public function __construct(
        string $type = 'text',
        ?string $text = null,
        ?bool $isFinal = null,
        array $params = []
    ) {
        $this->type = $type;
        $this->text = $text;
        $this->isFinal = $isFinal;
        $this->params = $params;
    }

    /**
     * Create a text event.
     *
     * @param string $text Text to synthesize
     * @param bool $isFinal Whether this is the final text
     */
    public static function text(string $text, bool $isFinal = false): self
    {
        return new self('text', $text, $isFinal);
    }

    /**
     * Create a flush event to request audio output.
     */
    public static function flush(): self
    {
        return new self('flush');
    }

    /**
     * Create a close event to end the session.
     */
    public static function close(): self
    {
        return new self('close');
    }

    /**
     * Convert to JSON string for sending over WebSocket.
     */
    public function toJson(): string
    {
        $data = ['type' => $this->type];

        if (null !== $this->text) {
            $data['text'] = $this->text;
        }

        if (null !== $this->isFinal) {
            $data['is_final'] = $this->isFinal;
        }

        foreach ($this->params as $key => $value) {
            $data[$key] = $value;
        }

        return json_encode($data, JSON_THROW_ON_ERROR);
    }

    /**
     * Convert to array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = ['type' => $this->type];

        if (null !== $this->text) {
            $data['text'] = $this->text;
        }

        if (null !== $this->isFinal) {
            $data['is_final'] = $this->isFinal;
        }

        return array_merge($data, $this->params);
    }
}
