<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

/**
 * Server event received from the Text-to-Speech WebSocket.
 */
class TtsServerEvent
{
    /**
     * Event type: "audio_chunk", "final", or "error".
     */
    public string $type;

    /**
     * Base64-encoded audio data (for audio_chunk events).
     */
    public ?string $audio;

    /**
     * The text that was synthesized.
     */
    public ?string $text;

    /**
     * Whether this is the final audio chunk.
     */
    public ?bool $isFinal;

    /**
     * Whether the audio was served from cache.
     */
    public ?bool $cached;

    /**
     * Time to first audio frame in milliseconds.
     */
    public ?int $timeToFirstAudioFrameMs;

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
        $this->type = $data['type'] ?? 'unknown';
        $this->audio = $data['audio'] ?? null;
        $this->text = $data['text'] ?? null;
        $this->isFinal = isset($data['is_final']) ? (bool) $data['is_final'] : null;
        $this->cached = isset($data['cached']) ? (bool) $data['cached'] : null;
        $this->timeToFirstAudioFrameMs = isset($data['time_to_first_audio_frame_ms'])
            ? (int) $data['time_to_first_audio_frame_ms']
            : null;
        $this->error = $data['error'] ?? null;
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
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        return new self($data);
    }

    /**
     * Check if this is an audio chunk event.
     */
    public function isAudioChunk(): bool
    {
        return 'audio_chunk' === $this->type;
    }

    /**
     * Check if this is a final event.
     */
    public function isFinalEvent(): bool
    {
        return 'final' === $this->type;
    }

    /**
     * Check if this is an error event.
     */
    public function isError(): bool
    {
        return 'error' === $this->type;
    }

    /**
     * Decode the audio data from base64.
     *
     * @return string|null Raw audio bytes
     */
    public function getAudioBytes(): ?string
    {
        if (null === $this->audio) {
            return null;
        }

        return base64_decode($this->audio, true) ?: null;
    }
}
