<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
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
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams\AudioFormat;

/**
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
interface TextToSpeechContract
{
    /**
     * @api
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
     * @param Telnyx|TelnyxShape $telnyx Telnyx provider-specific parameters. Use `voice_speed` and `temperature` for `Natural` and `NaturalHD` models. For the `Ultra` model, use `voice_speed`, `volume`, and `emotion`.
     * @param string $text the text to convert to speech
     * @param TextType|value-of<TextType> $textType Text type. Use `ssml` for SSML-formatted input (supported by AWS and Azure).
     * @param string $voice Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id`. Examples: `telnyx.NaturalHD.Alloy`, `Telnyx.Ultra.<voice_id>`, `azure.en-US-AvaMultilingualNeural`, `aws.Polly.Generative.Lucia`. When provided, `provider`, `model_id`, and `voice_id` are extracted automatically and take precedence over individual parameters.
     * @param array<string,mixed> $voiceSettings Provider-specific voice settings. Contents vary by provider — see provider-specific parameter objects below.
     * @param Xai|XaiShape $xai xAI provider-specific parameters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateSpeech(
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
        Xai|array|null $xai = null,
        RequestOptions|array|null $requestOptions = null,
    ): TextToSpeechGenerateSpeechResponse;

    /**
     * @api
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
    ): TextToSpeechListVoicesResponse;

    /**
     * @api
     *
     * @param AudioFormat|value-of<AudioFormat> $audioFormat Audio output format override. Supported for Telnyx models. `pcm` and `wav` are available for `Natural`/`NaturalHD` models. The `Ultra` model outputs PCM at 24kHz s16le or MP3 at 128kbps 24kHz.
     * @param bool $disableCache when `true`, bypass the audio cache and generate fresh audio
     * @param string $modelID Model identifier for the chosen provider. Examples: `Natural`, `NaturalHD`, `Ultra` (Telnyx); `Polly.Generative` (AWS).
     * @param \Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams\Provider|value-of<\Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams\Provider> $provider TTS provider. Defaults to `telnyx` if not specified. Ignored when `voice` is provided.
     * @param string $socketID Client-provided socket identifier for tracking. If not provided, one is generated server-side.
     * @param string $voice Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id` (e.g. `telnyx.NaturalHD.Telnyx_Alloy`, `Telnyx.Ultra.<voice_id>`, or `azure.en-US-AvaMultilingualNeural`). When provided, the `provider`, `model_id`, and `voice_id` are extracted automatically. Takes precedence over individual `provider`/`model_id`/`voice_id` parameters.
     * @param string $voiceID voice identifier for the chosen provider
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSpeech(
        AudioFormat|string|null $audioFormat = null,
        bool $disableCache = false,
        ?string $modelID = null,
        \Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams\Provider|string $provider = 'telnyx',
        ?string $socketID = null,
        ?string $voice = null,
        ?string $voiceID = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
