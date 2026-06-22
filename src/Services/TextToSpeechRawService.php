<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechRawContract;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Aws;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Azure;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Elevenlabs;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Minimax;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\OutputType;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Resemble;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Rime;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Telnyx;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\TextType;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Xai;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechResponse;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams\AudioFormat;

/**
 * Text to speech streaming command operations.
 *
 * @phpstan-import-type AwsShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Aws
 * @phpstan-import-type AzureShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Azure
 * @phpstan-import-type ElevenlabsShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Elevenlabs
 * @phpstan-import-type MinimaxShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Minimax
 * @phpstan-import-type ResembleShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Resemble
 * @phpstan-import-type RimeShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Rime
 * @phpstan-import-type TelnyxShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Telnyx
 * @phpstan-import-type XaiShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Xai
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
     * Generate synthesized speech audio from text input. Returns audio in the requested format (binary audio stream, base64-encoded JSON, or an audio URL for later retrieval).
     *
     * Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header.
     *
     * The `voice` parameter provides a convenient shorthand to specify provider, model, and voice in a single string (e.g. `telnyx.NaturalHD.Alloy` or `Telnyx.Ultra.<voice_id>`). Alternatively, specify `provider` explicitly along with provider-specific parameters.
     *
     * Supported providers: `aws`, `telnyx`, `azure`, `elevenlabs`, `minimax`, `rime`, `resemble`, `xai`.
     *
     * The Telnyx `Ultra` model supports 44 languages with emotion control, speed adjustment, and volume control. Use the `telnyx` provider-specific parameters to configure these features.
     *
     * @param array{
     *   aws?: Aws|AwsShape,
     *   azure?: Azure|AzureShape,
     *   disableCache?: bool,
     *   elevenlabs?: Elevenlabs|ElevenlabsShape,
     *   language?: string,
     *   minimax?: Minimax|MinimaxShape,
     *   outputType?: OutputType|value-of<OutputType>,
     *   provider?: Provider|value-of<Provider>,
     *   resemble?: Resemble|ResembleShape,
     *   rime?: Rime|RimeShape,
     *   telnyx?: Telnyx|TelnyxShape,
     *   text?: string,
     *   textType?: TextType|value-of<TextType>,
     *   voice?: string,
     *   voiceSettings?: array<string,mixed>,
     *   xai?: Xai|XaiShape,
     * }|TextToSpeechGenerateSpeechParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TextToSpeechGenerateSpeechResponse>
     *
     * @throws APIException
     */
    public function generateSpeech(
        array|TextToSpeechGenerateSpeechParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TextToSpeechGenerateSpeechParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'text-to-speech/speech',
            body: (object) $parsed,
            options: $options,
            convert: TextToSpeechGenerateSpeechResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of available voices from one or all TTS providers. When `provider` is specified, returns voices for that provider only. Otherwise, returns voices from all providers.
     *
     * Some providers (ElevenLabs, Resemble) require an API key to list voices.
     *
     * @param array{
     *   apiKey?: string,
     *   provider?: TextToSpeechListVoicesParams\Provider|value-of<TextToSpeechListVoicesParams\Provider>,
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
     * Supported providers: `aws`, `telnyx`, `azure`, `murfai`, `minimax`, `rime`, `resemble`, `elevenlabs`, `xai`.
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
     * **Note:** The Telnyx `Ultra` model is not available over WebSocket. Use the HTTP POST `/text-to-speech/speech` endpoint instead.
     *
     * @param array{
     *   audioFormat?: AudioFormat|value-of<AudioFormat>,
     *   disableCache?: bool,
     *   modelID?: string,
     *   provider?: TextToSpeechRetrieveSpeechParams\Provider|value-of<TextToSpeechRetrieveSpeechParams\Provider>,
     *   socketID?: string,
     *   voice?: string,
     *   voiceID?: string,
     * }|TextToSpeechRetrieveSpeechParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveSpeech(
        array|TextToSpeechRetrieveSpeechParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TextToSpeechRetrieveSpeechParams::parseRequest(
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
