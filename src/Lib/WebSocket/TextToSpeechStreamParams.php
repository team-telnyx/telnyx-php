<?php

declare(strict_types=1);

namespace Telnyx\Lib\WebSocket;

/**
 * Parameters for Text-to-Speech WebSocket streaming.
 */
class TextToSpeechStreamParams
{
    /**
     * Voice ID or name to use for synthesis.
     */
    public ?string $voice;

    /**
     * Voice provider (e.g., "Telnyx", "ElevenLabs", "Azure").
     */
    public ?string $voiceProvider;

    /**
     * Output audio format.
     * Valid values: "mp3", "wav", "pcm", "mulaw", "alaw".
     */
    public ?string $outputFormat;

    /**
     * Sample rate in Hz.
     */
    public ?int $sampleRate;

    /**
     * Language code.
     */
    public ?string $language;

    /**
     * Speaking rate/speed multiplier.
     */
    public ?float $speakingRate;

    /**
     * Client reference ID for tracking.
     */
    public ?string $clientRef;

    /**
     * @param array<string, mixed> $params Parameters array
     */
    public function __construct(array $params = [])
    {
        $this->voice = isset($params['voice']) ? (string) $params['voice'] : null;
        $this->voiceProvider = isset($params['voice_provider']) ? (string) $params['voice_provider'] : null;
        $this->outputFormat = isset($params['output_format']) ? (string) $params['output_format'] : null;
        $this->sampleRate = isset($params['sample_rate']) ? (int) $params['sample_rate'] : null;
        $this->language = isset($params['language']) ? (string) $params['language'] : null;
        $this->speakingRate = isset($params['speaking_rate']) ? (float) $params['speaking_rate'] : null;
        $this->clientRef = isset($params['client_ref']) ? (string) $params['client_ref'] : null;
    }

    /**
     * Convert to query parameters for URL.
     *
     * @return array<string, string>
     */
    public function toQueryParams(): array
    {
        $params = [];

        if (null !== $this->voice) {
            $params['voice'] = $this->voice;
        }

        if (null !== $this->voiceProvider) {
            $params['voice_provider'] = $this->voiceProvider;
        }

        if (null !== $this->outputFormat) {
            $params['output_format'] = $this->outputFormat;
        }

        if (null !== $this->sampleRate) {
            $params['sample_rate'] = (string) $this->sampleRate;
        }

        if (null !== $this->language) {
            $params['language'] = $this->language;
        }

        if (null !== $this->speakingRate) {
            $params['speaking_rate'] = (string) $this->speakingRate;
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
        $params = $this->toQueryParams();

        return $params ? http_build_query($params) : '';
    }
}
