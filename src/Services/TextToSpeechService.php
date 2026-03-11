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
     * Supported providers: `aws`, `telnyx`, `azure`, `elevenlabs`, `minimax`, `rime`, `resemble`, `inworld`.
     *
     * @param Aws|AwsShape $aws AWS Polly provider-specific parameters
     * @param Azure|AzureShape $azure azure Cognitive Services provider-specific parameters
     * @param bool $disableCache when `true`, bypass the audio cache and generate fresh audio
     * @param Elevenlabs|ElevenlabsShape $elevenlabs elevenLabs provider-specific parameters
     * @param mixed $inworld inworld provider-specific parameters
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
        mixed $inworld = null,
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
                'inworld' => $inworld,
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
}
