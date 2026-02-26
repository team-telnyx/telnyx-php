<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateSpeech(
        string $text,
        string $voice,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $elevenlabsAPIKeyRef Reference to your ElevenLabs API key stored in the Telnyx Portal
     * @param Provider|value-of<Provider> $provider Filter voices by provider
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listVoices(
        ?string $elevenlabsAPIKeyRef = null,
        Provider|string|null $provider = null,
        RequestOptions|array|null $requestOptions = null,
    ): TextToSpeechListVoicesResponse;
}
