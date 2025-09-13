<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechContract;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

use const Telnyx\Core\OMIT as omit;

final class TextToSpeechService implements TextToSpeechContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Converts the provided text to speech using the specified voice and returns audio data
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
    ): string {
        [$parsed, $options] = TextToSpeechGenerateSpeechParams::parseRequest(
            ['text' => $text, 'voice' => $voice],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'text-to-speech/speech',
            headers: ['Accept' => 'audio/mpeg'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Returns a list of voices that can be used with the text to speech commands.
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
    ): TextToSpeechListVoicesResponse {
        [$parsed, $options] = TextToSpeechListVoicesParams::parseRequest(
            ['elevenlabsAPIKeyRef' => $elevenlabsAPIKeyRef, 'provider' => $provider],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'text-to-speech/voices',
            query: $parsed,
            options: $options,
            convert: TextToSpeechListVoicesResponse::class,
        );
    }
}
