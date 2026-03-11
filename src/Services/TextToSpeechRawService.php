<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechRawContract;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Aws;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Azure;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Elevenlabs;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Minimax;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\OutputType;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Provider;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Resemble;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Rime;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Telnyx;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\TextType;
use Telnyx\TextToSpeech\TextToSpeechGenerateResponse;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

/**
 * Text to speech streaming command operations.
 *
 * @phpstan-import-type AwsShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Aws
 * @phpstan-import-type AzureShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Azure
 * @phpstan-import-type ElevenlabsShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Elevenlabs
 * @phpstan-import-type MinimaxShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Minimax
 * @phpstan-import-type ResembleShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Resemble
 * @phpstan-import-type RimeShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Rime
 * @phpstan-import-type TelnyxShape from \Telnyx\TextToSpeech\TextToSpeechGenerateParams\Telnyx
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
     * The `voice` parameter provides a convenient shorthand to specify provider, model, and voice in a single string (e.g. `telnyx.NaturalHD.Alloy`). Alternatively, specify `provider` explicitly along with provider-specific parameters.
     *
     * Supported providers: `aws`, `telnyx`, `azure`, `elevenlabs`, `minimax`, `rime`, `resemble`, `inworld`.
     *
     * @param array{
     *   aws?: Aws|AwsShape,
     *   azure?: Azure|AzureShape,
     *   disableCache?: bool,
     *   elevenlabs?: Elevenlabs|ElevenlabsShape,
     *   inworld?: mixed,
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
     * }|TextToSpeechGenerateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TextToSpeechGenerateResponse>
     *
     * @throws APIException
     */
    public function generate(
        array|TextToSpeechGenerateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TextToSpeechGenerateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'text-to-speech/speech',
            body: (object) $parsed,
            options: $options,
            convert: TextToSpeechGenerateResponse::class,
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
}
