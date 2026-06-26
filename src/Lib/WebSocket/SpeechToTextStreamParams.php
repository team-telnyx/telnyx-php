<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

/**
 * Parameters for Speech-to-Text WebSocket streaming.
 */
class SpeechToTextStreamParams
{
    /**
     * The transcription engine to use.
     * Valid values: "Deepgram", "Telnyx".
     */
    public string $transcriptionEngine;

    /**
     * Audio input format.
     * Valid values: "wav", "mp3", "pcm", "mulaw", "alaw".
     */
    public string $inputFormat;

    /**
     * Language code for transcription.
     * Examples: "en-US", "es-ES", "fr-FR".
     */
    public string $language;

    /**
     * Sample rate in Hz (e.g., 8000, 16000, 44100).
     */
    public ?int $sampleRate;

    /**
     * Enable interim/partial results.
     */
    public ?bool $interimResults;

    /**
     * Client reference ID for tracking.
     */
    public ?string $clientRef;

    /**
     * @param array<string, mixed> $params Parameters array
     */
    public function __construct(array $params = [])
    {
        $this->transcriptionEngine = isset($params['transcription_engine']) ? (string) $params['transcription_engine'] : 'Deepgram';
        $this->inputFormat = isset($params['input_format']) ? (string) $params['input_format'] : 'wav';
        $this->language = isset($params['language']) ? (string) $params['language'] : 'en-US';
        $this->sampleRate = isset($params['sample_rate']) ? (int) $params['sample_rate'] : null;
        $this->interimResults = isset($params['interim_results']) ? (bool) $params['interim_results'] : null;
        $this->clientRef = isset($params['client_ref']) ? (string) $params['client_ref'] : null;
    }

    /**
     * Convert to query parameters for URL.
     *
     * @return array<string, string>
     */
    public function toQueryParams(): array
    {
        $params = [
            'transcription_engine' => $this->transcriptionEngine,
            'input_format' => $this->inputFormat,
            'language' => $this->language,
        ];

        if (null !== $this->sampleRate) {
            $params['sample_rate'] = (string) $this->sampleRate;
        }

        if (null !== $this->interimResults) {
            $params['interim_results'] = $this->interimResults ? 'true' : 'false';
        }

        if (null !== $this->clientRef) {
            $params['client_ref'] = $this->clientRef;
        }

        return $params;
    }

    /**
     * Build query string for URL.
     */
    public function toQueryString(): string
    {
        return http_build_query($this->toQueryParams());
    }
}
