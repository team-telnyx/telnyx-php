<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechContract;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TextToSpeechService implements TextToSpeechContract
{
    /**
     * @api
     */
    public TextToSpeechRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TextToSpeechRawService($client);
    }

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateSpeech(
        string $text,
        string $voice,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['text' => $text, 'voice' => $voice]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateSpeech(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of voices that can be used with the text to speech commands.
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
    ): TextToSpeechListVoicesResponse {
        $params = Util::removeNulls(
            ['elevenlabsAPIKeyRef' => $elevenlabsAPIKeyRef, 'provider' => $provider]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listVoices(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
