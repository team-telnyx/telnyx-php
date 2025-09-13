<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

use const Telnyx\Core\OMIT as omit;

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
     */
    public function generateSpeech(
        $text,
        $voice,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $elevenlabsAPIKeyRef Reference to your ElevenLabs API key stored in the Telnyx Portal
     * @param Provider|value-of<Provider> $provider Filter voices by provider
     *
     * @return TextToSpeechListVoicesResponse<HasRawResponse>
     */
    public function listVoices(
        $elevenlabsAPIKeyRef = omit,
        $provider = omit,
        ?RequestOptions $requestOptions = null,
    ): TextToSpeechListVoicesResponse;
}
