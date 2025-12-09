<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

interface TextToSpeechContract
{
    /**
     * @api
     *
     * @param string $text The text to convert to speech
     * @param string $voice The voice ID in the format Provider.ModelId.VoiceId.
     *
     * Examples:
     * - AWS.Polly.Joanna-Neural
     * - Azure.en-US-AvaMultilingualNeural
     * - ElevenLabs.eleven_multilingual_v2.Rachel
     * - Telnyx.KokoroTTS.af
     *
     * Use the `GET /text-to-speech/voices` endpoint to get a complete list of available voices.
     *
     * @throws APIException
     */
    public function generateSpeech(
        string $text,
        string $voice,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $elevenlabsAPIKeyRef Reference to your ElevenLabs API key stored in the Telnyx Portal
     * @param 'aws'|'azure'|'elevenlabs'|'telnyx'|Provider $provider Filter voices by provider
     *
     * @throws APIException
     */
    public function listVoices(
        ?string $elevenlabsAPIKeyRef = null,
        string|Provider|null $provider = null,
        ?RequestOptions $requestOptions = null,
    ): TextToSpeechListVoicesResponse;
}
