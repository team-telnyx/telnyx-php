<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
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

/**
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
 * @see Telnyx\Services\TextToSpeechService::generateSpeech()
 *
 * @phpstan-import-type AwsShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Aws
 * @phpstan-import-type AzureShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Azure
 * @phpstan-import-type ElevenlabsShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Elevenlabs
 * @phpstan-import-type MinimaxShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Minimax
 * @phpstan-import-type ResembleShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Resemble
 * @phpstan-import-type RimeShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Rime
 * @phpstan-import-type TelnyxShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Telnyx
 * @phpstan-import-type XaiShape from \Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Xai
 *
 * @phpstan-type TextToSpeechGenerateSpeechParamsShape = array{
 *   aws?: null|Aws|AwsShape,
 *   azure?: null|Azure|AzureShape,
 *   disableCache?: bool|null,
 *   elevenlabs?: null|Elevenlabs|ElevenlabsShape,
 *   language?: string|null,
 *   minimax?: null|Minimax|MinimaxShape,
 *   outputType?: null|OutputType|value-of<OutputType>,
 *   provider?: null|Provider|value-of<Provider>,
 *   resemble?: null|Resemble|ResembleShape,
 *   rime?: null|Rime|RimeShape,
 *   telnyx?: null|Telnyx|TelnyxShape,
 *   text?: string|null,
 *   textType?: null|TextType|value-of<TextType>,
 *   voice?: string|null,
 *   voiceSettings?: array<string,mixed>|null,
 *   xai?: null|Xai|XaiShape,
 * }
 */
final class TextToSpeechGenerateSpeechParams implements BaseModel
{
    /** @use SdkModel<TextToSpeechGenerateSpeechParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * AWS Polly provider-specific parameters.
     */
    #[Optional]
    public ?Aws $aws;

    /**
     * Azure Cognitive Services provider-specific parameters.
     */
    #[Optional]
    public ?Azure $azure;

    /**
     * When `true`, bypass the audio cache and generate fresh audio.
     */
    #[Optional('disable_cache')]
    public ?bool $disableCache;

    /**
     * ElevenLabs provider-specific parameters.
     */
    #[Optional]
    public ?Elevenlabs $elevenlabs;

    /**
     * Language code (e.g. `en-US`). Usage varies by provider.
     */
    #[Optional]
    public ?string $language;

    /**
     * Minimax provider-specific parameters.
     */
    #[Optional]
    public ?Minimax $minimax;

    /**
     * Determines the response format. `binary_output` returns raw audio bytes, `base64_output` returns base64-encoded audio in JSON.
     *
     * @var value-of<OutputType>|null $outputType
     */
    #[Optional('output_type', enum: OutputType::class)]
    public ?string $outputType;

    /**
     * TTS provider. Required unless `voice` is provided.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * Resemble AI provider-specific parameters.
     */
    #[Optional]
    public ?Resemble $resemble;

    /**
     * Rime provider-specific parameters.
     */
    #[Optional]
    public ?Rime $rime;

    /**
     * Telnyx provider-specific parameters. Use `voice_speed` and `temperature` for `Natural` and `NaturalHD` models. For the `Ultra` model, use `voice_speed`, `volume`, and `emotion`.
     */
    #[Optional]
    public ?Telnyx $telnyx;

    /**
     * The text to convert to speech.
     */
    #[Optional]
    public ?string $text;

    /**
     * Text type. Use `ssml` for SSML-formatted input (supported by AWS and Azure).
     *
     * @var value-of<TextType>|null $textType
     */
    #[Optional('text_type', enum: TextType::class)]
    public ?string $textType;

    /**
     * Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id`. Examples: `telnyx.NaturalHD.Alloy`, `Telnyx.Ultra.<voice_id>`, `azure.en-US-AvaMultilingualNeural`, `aws.Polly.Generative.Lucia`. When provided, `provider`, `model_id`, and `voice_id` are extracted automatically and take precedence over individual parameters.
     */
    #[Optional]
    public ?string $voice;

    /**
     * Provider-specific voice settings. Contents vary by provider — see provider-specific parameter objects below.
     *
     * @var array<string,mixed>|null $voiceSettings
     */
    #[Optional('voice_settings', map: 'mixed')]
    public ?array $voiceSettings;

    /**
     * xAI provider-specific parameters.
     */
    #[Optional]
    public ?Xai $xai;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Aws|AwsShape|null $aws
     * @param Azure|AzureShape|null $azure
     * @param Elevenlabs|ElevenlabsShape|null $elevenlabs
     * @param Minimax|MinimaxShape|null $minimax
     * @param OutputType|value-of<OutputType>|null $outputType
     * @param Provider|value-of<Provider>|null $provider
     * @param Resemble|ResembleShape|null $resemble
     * @param Rime|RimeShape|null $rime
     * @param Telnyx|TelnyxShape|null $telnyx
     * @param TextType|value-of<TextType>|null $textType
     * @param array<string,mixed>|null $voiceSettings
     * @param Xai|XaiShape|null $xai
     */
    public static function with(
        Aws|array|null $aws = null,
        Azure|array|null $azure = null,
        ?bool $disableCache = null,
        Elevenlabs|array|null $elevenlabs = null,
        ?string $language = null,
        Minimax|array|null $minimax = null,
        OutputType|string|null $outputType = null,
        Provider|string|null $provider = null,
        Resemble|array|null $resemble = null,
        Rime|array|null $rime = null,
        Telnyx|array|null $telnyx = null,
        ?string $text = null,
        TextType|string|null $textType = null,
        ?string $voice = null,
        ?array $voiceSettings = null,
        Xai|array|null $xai = null,
    ): self {
        $self = new self;

        null !== $aws && $self['aws'] = $aws;
        null !== $azure && $self['azure'] = $azure;
        null !== $disableCache && $self['disableCache'] = $disableCache;
        null !== $elevenlabs && $self['elevenlabs'] = $elevenlabs;
        null !== $language && $self['language'] = $language;
        null !== $minimax && $self['minimax'] = $minimax;
        null !== $outputType && $self['outputType'] = $outputType;
        null !== $provider && $self['provider'] = $provider;
        null !== $resemble && $self['resemble'] = $resemble;
        null !== $rime && $self['rime'] = $rime;
        null !== $telnyx && $self['telnyx'] = $telnyx;
        null !== $text && $self['text'] = $text;
        null !== $textType && $self['textType'] = $textType;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;
        null !== $xai && $self['xai'] = $xai;

        return $self;
    }

    /**
     * AWS Polly provider-specific parameters.
     *
     * @param Aws|AwsShape $aws
     */
    public function withAws(Aws|array $aws): self
    {
        $self = clone $this;
        $self['aws'] = $aws;

        return $self;
    }

    /**
     * Azure Cognitive Services provider-specific parameters.
     *
     * @param Azure|AzureShape $azure
     */
    public function withAzure(Azure|array $azure): self
    {
        $self = clone $this;
        $self['azure'] = $azure;

        return $self;
    }

    /**
     * When `true`, bypass the audio cache and generate fresh audio.
     */
    public function withDisableCache(bool $disableCache): self
    {
        $self = clone $this;
        $self['disableCache'] = $disableCache;

        return $self;
    }

    /**
     * ElevenLabs provider-specific parameters.
     *
     * @param Elevenlabs|ElevenlabsShape $elevenlabs
     */
    public function withElevenlabs(Elevenlabs|array $elevenlabs): self
    {
        $self = clone $this;
        $self['elevenlabs'] = $elevenlabs;

        return $self;
    }

    /**
     * Language code (e.g. `en-US`). Usage varies by provider.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Minimax provider-specific parameters.
     *
     * @param Minimax|MinimaxShape $minimax
     */
    public function withMinimax(Minimax|array $minimax): self
    {
        $self = clone $this;
        $self['minimax'] = $minimax;

        return $self;
    }

    /**
     * Determines the response format. `binary_output` returns raw audio bytes, `base64_output` returns base64-encoded audio in JSON.
     *
     * @param OutputType|value-of<OutputType> $outputType
     */
    public function withOutputType(OutputType|string $outputType): self
    {
        $self = clone $this;
        $self['outputType'] = $outputType;

        return $self;
    }

    /**
     * TTS provider. Required unless `voice` is provided.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Resemble AI provider-specific parameters.
     *
     * @param Resemble|ResembleShape $resemble
     */
    public function withResemble(Resemble|array $resemble): self
    {
        $self = clone $this;
        $self['resemble'] = $resemble;

        return $self;
    }

    /**
     * Rime provider-specific parameters.
     *
     * @param Rime|RimeShape $rime
     */
    public function withRime(Rime|array $rime): self
    {
        $self = clone $this;
        $self['rime'] = $rime;

        return $self;
    }

    /**
     * Telnyx provider-specific parameters. Use `voice_speed` and `temperature` for `Natural` and `NaturalHD` models. For the `Ultra` model, use `voice_speed`, `volume`, and `emotion`.
     *
     * @param Telnyx|TelnyxShape $telnyx
     */
    public function withTelnyx(Telnyx|array $telnyx): self
    {
        $self = clone $this;
        $self['telnyx'] = $telnyx;

        return $self;
    }

    /**
     * The text to convert to speech.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Text type. Use `ssml` for SSML-formatted input (supported by AWS and Azure).
     *
     * @param TextType|value-of<TextType> $textType
     */
    public function withTextType(TextType|string $textType): self
    {
        $self = clone $this;
        $self['textType'] = $textType;

        return $self;
    }

    /**
     * Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id`. Examples: `telnyx.NaturalHD.Alloy`, `Telnyx.Ultra.<voice_id>`, `azure.en-US-AvaMultilingualNeural`, `aws.Polly.Generative.Lucia`. When provided, `provider`, `model_id`, and `voice_id` are extracted automatically and take precedence over individual parameters.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * Provider-specific voice settings. Contents vary by provider — see provider-specific parameter objects below.
     *
     * @param array<string,mixed> $voiceSettings
     */
    public function withVoiceSettings(array $voiceSettings): self
    {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * xAI provider-specific parameters.
     *
     * @param Xai|XaiShape $xai
     */
    public function withXai(Xai|array $xai): self
    {
        $self = clone $this;
        $self['xai'] = $xai;

        return $self;
    }
}
