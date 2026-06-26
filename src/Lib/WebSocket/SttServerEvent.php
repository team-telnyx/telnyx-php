<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

/**
 * Server event received from the Speech-to-Text WebSocket.
 */
class SttServerEvent
{
    /**
     * Event type: "transcript" or "error".
     */
    public string $type;

    /**
     * The transcribed text (for transcript events).
     */
    public ?string $transcript;

    /**
     * Whether this is the final transcript for the utterance.
     */
    public ?bool $isFinal;

    /**
     * Confidence score (0.0 to 1.0).
     */
    public ?float $confidence;

    /**
     * Error message (for error events).
     */
    public ?string $error;

    /**
     * Raw event data from the server.
     *
     * @var array<string, mixed>
     */
    public array $rawData;

    /**
     * @param array<string, mixed> $data Raw event data from server
     */
    public function __construct(array $data)
    {
        $this->rawData = $data;
        $this->type = isset($data['type']) ? (string) $data['type'] : 'unknown';
        $this->transcript = isset($data['transcript']) ? (string) $data['transcript'] : null;
        $this->isFinal = isset($data['is_final']) ? (bool) $data['is_final'] : null;
        $this->confidence = isset($data['confidence']) ? (float) $data['confidence'] : null;
        $this->error = isset($data['error']) ? (string) $data['error'] : null;
    }

    /**
     * Create an event from JSON string.
     *
     * @param string $json JSON string from server
     *
     * @throws \JsonException
     */
    public static function fromJson(string $json): self
    {
        /** @var array<string, mixed> $data */
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return new self($data);
    }

    /**
     * Check if this is a transcript event.
     */
    public function isTranscript(): bool
    {
        return 'transcript' === $this->type;
    }

    /**
     * Check if this is an error event.
     */
    public function isError(): bool
    {
        return 'error' === $this->type;
    }
}
