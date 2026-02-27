<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechRawContract;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechStreamParams;
use Telnyx\TextToSpeech\TextToSpeechStreamParams\AudioFormat;

/**
 * Text to speech streaming command operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TextToSpeechRawService implements TextToSpeechRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of available voices from one or all TTS providers. When `provider` is specified, returns voices for that provider only. Otherwise, returns voices from all providers.
     *
     * Some providers (ElevenLabs, Resemble) require an API key to list voices.
     *
     * @param array{
     *   apiKey?: string, provider?: Provider|value-of<Provider>
     * }|TextToSpeechListVoicesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TextToSpeechListVoicesResponse>
     *
     * @throws APIException
     */
    public function listVoices(
        array|TextToSpeechListVoicesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TextToSpeechListVoicesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'text-to-speech/voices',
            query: Util::array_transform_keys($parsed, ['apiKey' => 'api_key']),
            options: $options,
            convert: TextToSpeechListVoicesResponse::class,
        );
    }

    /**
     * @api
     *
     * Open a WebSocket connection to stream text and receive synthesized audio in real time. Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header. Send JSON frames with text to synthesize; receive JSON frames containing base64-encoded audio chunks.
     *
     * Supported providers: `aws`, `telnyx`, `azure`, `murfai`, `minimax`, `rime`, `resemble`, `elevenlabs`.
     *
     * **Connection flow:**
     * 1. Open WebSocket with query parameters specifying provider, voice, and model.
     * 2. Send an initial handshake message `{"text": " "}` (single space) with optional `voice_settings` to initialize the session.
     * 3. Send text messages as `{"text": "Hello world"}`.
     * 4. Receive audio chunks as JSON frames with base64-encoded audio.
     * 5. A final frame with `isFinal: true` indicates the end of audio for the current text.
     *
     * To interrupt and restart synthesis mid-stream, send `{"force": true}` — the current worker is stopped and a new one is started.
     *
     * @param array{
     *   audioFormat?: AudioFormat|value-of<AudioFormat>,
     *   disableCache?: bool,
     *   modelID?: string,
     *   provider?: TextToSpeechStreamParams\Provider|value-of<TextToSpeechStreamParams\Provider>,
     *   socketID?: string,
     *   voice?: string,
     *   voiceID?: string,
     * }|TextToSpeechStreamParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function stream(
        array|TextToSpeechStreamParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TextToSpeechStreamParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'text-to-speech/speech',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'audioFormat' => 'audio_format',
                    'disableCache' => 'disable_cache',
                    'modelID' => 'model_id',
                    'socketID' => 'socket_id',
                    'voiceID' => 'voice_id',
                ],
            ),
            options: $options,
            convert: null,
        );
    }
}
