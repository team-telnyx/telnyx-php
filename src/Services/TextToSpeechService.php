<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TextToSpeechContract;
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
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechStreamParams\AudioFormat;

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
     * Generate synthesized speech audio from text input. Returns audio in the requested format (binary audio stream, base64-encoded JSON, or an audio URL for later retrieval).
     *
     * Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header.
     *
     * The `voice` parameter provides a convenient shorthand to specify provider, model, and voice in a single string (e.g. `telnyx.NaturalHD.Alloy`). Alternatively, specify `provider` explicitly along with provider-specific parameters.
     *
     * Supported providers: `aws`, `telnyx`, `azure`, `elevenlabs`, `minimax`, `rime`, `resemble`.
     *
     * @param Aws|AwsShape $aws AWS Polly provider-specific parameters
     * @param Azure|AzureShape $azure azure Cognitive Services provider-specific parameters
     * @param bool $disableCache when `true`, bypass the audio cache and generate fresh audio
     * @param Elevenlabs|ElevenlabsShape $elevenlabs elevenLabs provider-specific parameters
     * @param string $language Language code (e.g. `en-US`). Usage varies by provider.
     * @param Minimax|MinimaxShape $minimax minimax provider-specific parameters
     * @param OutputType|value-of<OutputType> $outputType Determines the response format. `binary_output` returns raw audio bytes, `base64_output` returns base64-encoded audio in JSON.
     * @param Provider|value-of<Provider> $provider TTS provider. Required unless `voice` is provided.
     * @param Resemble|ResembleShape $resemble resemble AI provider-specific parameters
     * @param Rime|RimeShape $rime rime provider-specific parameters
     * @param Telnyx|TelnyxShape $telnyx telnyx provider-specific parameters
     * @param string $text the text to convert to speech
     * @param TextType|value-of<TextType> $textType Text type. Use `ssml` for SSML-formatted input (supported by AWS and Azure).
     * @param string $voice Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id`. Examples: `telnyx.NaturalHD.Alloy`, `azure.en-US-AvaMultilingualNeural`, `aws.Polly.Generative.Lucia`. When provided, `provider`, `model_id`, and `voice_id` are extracted automatically and take precedence over individual parameters.
     * @param array<string,mixed> $voiceSettings Provider-specific voice settings. Contents vary by provider — see provider-specific parameter objects below.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generate(
        Aws|array|null $aws = null,
        Azure|array|null $azure = null,
        bool $disableCache = false,
        Elevenlabs|array|null $elevenlabs = null,
        ?string $language = null,
        Minimax|array|null $minimax = null,
        OutputType|string $outputType = 'binary_output',
        Provider|string|null $provider = null,
        Resemble|array|null $resemble = null,
        Rime|array|null $rime = null,
        Telnyx|array|null $telnyx = null,
        ?string $text = null,
        TextType|string|null $textType = null,
        ?string $voice = null,
        ?array $voiceSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): TextToSpeechGenerateResponse {
        $params = Util::removeNulls(
            [
                'aws' => $aws,
                'azure' => $azure,
                'disableCache' => $disableCache,
                'elevenlabs' => $elevenlabs,
                'language' => $language,
                'minimax' => $minimax,
                'outputType' => $outputType,
                'provider' => $provider,
                'resemble' => $resemble,
                'rime' => $rime,
                'telnyx' => $telnyx,
                'text' => $text,
                'textType' => $textType,
                'voice' => $voice,
                'voiceSettings' => $voiceSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of available voices from one or all TTS providers. When `provider` is specified, returns voices for that provider only. Otherwise, returns voices from all providers.
     *
     * Some providers (ElevenLabs, Resemble) require an API key to list voices.
     *
     * @param string $apiKey API key for providers that require one to list voices (e.g. ElevenLabs).
     * @param \Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider|value-of<\Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider> $provider Filter voices by provider. If omitted, voices from all providers are returned.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listVoices(
        ?string $apiKey = null,
        \Telnyx\TextToSpeech\TextToSpeechListVoicesParams\Provider|string|null $provider = null,
        RequestOptions|array|null $requestOptions = null,
    ): TextToSpeechListVoicesResponse {
        $params = Util::removeNulls(['apiKey' => $apiKey, 'provider' => $provider]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listVoices(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param AudioFormat|value-of<AudioFormat> $audioFormat Audio output format override. Supported for Telnyx `Natural`/`NaturalHD` models only. Accepted values: `pcm`, `wav`.
     * @param bool $disableCache when `true`, bypass the audio cache and generate fresh audio
     * @param string $modelID Model identifier for the chosen provider. Examples: `Natural`, `NaturalHD` (Telnyx); `Polly.Generative` (AWS).
     * @param \Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider|value-of<\Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider> $provider TTS provider. Defaults to `telnyx` if not specified. Ignored when `voice` is provided.
     * @param string $socketID Client-provided socket identifier for tracking. If not provided, one is generated server-side.
     * @param string $voice Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id` (e.g. `telnyx.NaturalHD.Telnyx_Alloy` or `azure.en-US-AvaMultilingualNeural`). When provided, the `provider`, `model_id`, and `voice_id` are extracted automatically. Takes precedence over individual `provider`/`model_id`/`voice_id` parameters.
     * @param string $voiceID voice identifier for the chosen provider
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function stream(
        AudioFormat|string|null $audioFormat = null,
        bool $disableCache = false,
        ?string $modelID = null,
        \Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider|string $provider = 'telnyx',
        ?string $socketID = null,
        ?string $voice = null,
        ?string $voiceID = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'audioFormat' => $audioFormat,
                'disableCache' => $disableCache,
                'modelID' => $modelID,
                'provider' => $provider,
                'socketID' => $socketID,
                'voice' => $voice,
                'voiceID' => $voiceID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->stream(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
