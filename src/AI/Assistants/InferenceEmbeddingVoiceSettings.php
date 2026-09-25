<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember0;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember1;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio\UnionMember2;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\LanguageBoost;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type BackgroundAudioVariants from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio
 * @phpstan-import-type BackgroundAudioShape from \Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\BackgroundAudio
 *
 * @phpstan-type InferenceEmbeddingVoiceSettingsShape = array{
 *   voice: string,
 *   apiKeyRef?: string|null,
 *   backgroundAudio?: BackgroundAudioShape|null,
 *   expressiveMode?: bool|null,
 *   languageBoost?: null|LanguageBoost|value-of<LanguageBoost>,
 *   similarityBoost?: float|null,
 *   speed?: float|null,
 *   style?: float|null,
 *   temperature?: float|null,
 *   useSpeakerBoost?: bool|null,
 *   voiceSpeed?: float|null,
 * }
 */
final class InferenceEmbeddingVoiceSettings implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingVoiceSettingsShape> */
    use SdkModel;

    /**
     * The voice to be used by the voice assistant. Check the full list of [available voices](https://developers.telnyx.com/docs/tts-stt/tts-available-voices) via our voices API.
     * To use ElevenLabs, you must reference your ElevenLabs API key as an integration secret under the `api_key_ref` field. See [integration secrets documentation](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for details. For Telnyx voices, use `Telnyx.<model_id>.<voice_id>` (e.g. Telnyx.KokoroTTS.af_heart). For Soniox voices, use `Soniox.tts-rt-v2.<voice_id>` (e.g. Soniox.tts-rt-v2.Emma); every Soniox voice speaks all supported languages.
     * The voice portion of the identifier supports [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) using mustache syntax (e.g. `Telnyx.Ultra.{{voice_id}}`). The variable is resolved at call time from your dynamic variables webhook, allowing you to select the voice dynamically per call.
     */
    #[Required]
    public string $voice;

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your ElevenLabs API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * Optional background audio to play on the call. Use a predefined media bed, or supply a looped MP3 URL. If a media URL is chosen in the portal, customers can preview it before saving.
     *
     * @var BackgroundAudioVariants|null $backgroundAudio
     */
    #[Optional('background_audio')]
    public UnionMember0|UnionMember1|UnionMember2|null $backgroundAudio;

    /**
     * Enables emotionally expressive speech using SSML emotion tags. When enabled, the assistant uses audio tags like angry, excited, content, and sad to add emotional nuance. Only supported for Telnyx Ultra voices.
     */
    #[Optional('expressive_mode')]
    public ?bool $expressiveMode;

    /**
     * Enhances recognition for specific languages and dialects during MiniMax TTS synthesis. Default is null (no boost). Set to 'auto' for automatic language detection. Only applicable when using MiniMax voices.
     *
     * @var value-of<LanguageBoost>|null $languageBoost
     */
    #[Optional('language_boost', enum: LanguageBoost::class, nullable: true)]
    public ?string $languageBoost;

    /**
     * Determines how closely the AI should adhere to the original voice when attempting to replicate it. Only applicable when using ElevenLabs.
     */
    #[Optional('similarity_boost')]
    public ?float $similarityBoost;

    /**
     * Adjusts speech velocity. 1.0 is default speed; values less than 1.0 slow speech; values greater than 1.0 accelerate it. Only applicable when using ElevenLabs.
     */
    #[Optional]
    public ?float $speed;

    /**
     * Determines the style exaggeration of the voice. Amplifies speaker style but consumes additional resources when set above 0. Only applicable when using ElevenLabs.
     */
    #[Optional]
    public ?float $style;

    /**
     * Determines how stable the voice is and the randomness between each generation. Lower values create a broader emotional range; higher values produce more consistent, monotonous output. Only applicable when using ElevenLabs.
     */
    #[Optional]
    public ?float $temperature;

    /**
     * Amplifies similarity to the original speaker voice. Increases computational load and latency slightly. Only applicable when using ElevenLabs.
     */
    #[Optional('use_speaker_boost')]
    public ?bool $useSpeakerBoost;

    /**
     * The speed of the voice in the range [0.25, 2.0]. 1.0 is deafult speed. Larger numbers make the voice faster, smaller numbers make it slower. This is only applicable for Telnyx Natural voices and Soniox voices (0.7 to 1.3 for Soniox).
     */
    #[Optional('voice_speed')]
    public ?float $voiceSpeed;

    /**
     * `new InferenceEmbeddingVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingVoiceSettings::with(voice: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingVoiceSettings)->withVoice(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|LanguageBoost|value-of<LanguageBoost>|null $languageBoost
     * @param BackgroundAudioShape|null $backgroundAudio
     */
    public static function with(
        string $voice,
        Omitted|LanguageBoost|string|null $languageBoost = Omitted::VALUE,
        ?string $apiKeyRef = null,
        UnionMember0|array|UnionMember1|UnionMember2|null $backgroundAudio = null,
        ?bool $expressiveMode = null,
        ?float $similarityBoost = null,
        ?float $speed = null,
        ?float $style = null,
        ?float $temperature = null,
        ?bool $useSpeakerBoost = null,
        ?float $voiceSpeed = null,
    ): self {
        $self = new self;

        $self['voice'] = $voice;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $backgroundAudio && $self['backgroundAudio'] = $backgroundAudio;
        null !== $expressiveMode && $self['expressiveMode'] = $expressiveMode;
        Omitted::VALUE !== $languageBoost && $self['languageBoost'] = $languageBoost;
        null !== $similarityBoost && $self['similarityBoost'] = $similarityBoost;
        null !== $speed && $self['speed'] = $speed;
        null !== $style && $self['style'] = $style;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $useSpeakerBoost && $self['useSpeakerBoost'] = $useSpeakerBoost;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * The voice to be used by the voice assistant. Check the full list of [available voices](https://developers.telnyx.com/docs/tts-stt/tts-available-voices) via our voices API.
     * To use ElevenLabs, you must reference your ElevenLabs API key as an integration secret under the `api_key_ref` field. See [integration secrets documentation](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for details. For Telnyx voices, use `Telnyx.<model_id>.<voice_id>` (e.g. Telnyx.KokoroTTS.af_heart). For Soniox voices, use `Soniox.tts-rt-v2.<voice_id>` (e.g. Soniox.tts-rt-v2.Emma); every Soniox voice speaks all supported languages.
     * The voice portion of the identifier supports [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) using mustache syntax (e.g. `Telnyx.Ultra.{{voice_id}}`). The variable is resolved at call time from your dynamic variables webhook, allowing you to select the voice dynamically per call.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your ElevenLabs API key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * Optional background audio to play on the call. Use a predefined media bed, or supply a looped MP3 URL. If a media URL is chosen in the portal, customers can preview it before saving.
     *
     * @param BackgroundAudioShape $backgroundAudio
     */
    public function withBackgroundAudio(
        UnionMember0|array|UnionMember1|UnionMember2 $backgroundAudio
    ): self {
        $self = clone $this;
        $self['backgroundAudio'] = $backgroundAudio;

        return $self;
    }

    /**
     * Enables emotionally expressive speech using SSML emotion tags. When enabled, the assistant uses audio tags like angry, excited, content, and sad to add emotional nuance. Only supported for Telnyx Ultra voices.
     */
    public function withExpressiveMode(bool $expressiveMode): self
    {
        $self = clone $this;
        $self['expressiveMode'] = $expressiveMode;

        return $self;
    }

    /**
     * Enhances recognition for specific languages and dialects during MiniMax TTS synthesis. Default is null (no boost). Set to 'auto' for automatic language detection. Only applicable when using MiniMax voices.
     *
     * @param LanguageBoost|value-of<LanguageBoost>|null $languageBoost
     */
    public function withLanguageBoost(
        LanguageBoost|string|null $languageBoost
    ): self {
        $self = clone $this;
        $self['languageBoost'] = $languageBoost;

        return $self;
    }

    /**
     * Determines how closely the AI should adhere to the original voice when attempting to replicate it. Only applicable when using ElevenLabs.
     */
    public function withSimilarityBoost(float $similarityBoost): self
    {
        $self = clone $this;
        $self['similarityBoost'] = $similarityBoost;

        return $self;
    }

    /**
     * Adjusts speech velocity. 1.0 is default speed; values less than 1.0 slow speech; values greater than 1.0 accelerate it. Only applicable when using ElevenLabs.
     */
    public function withSpeed(float $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }

    /**
     * Determines the style exaggeration of the voice. Amplifies speaker style but consumes additional resources when set above 0. Only applicable when using ElevenLabs.
     */
    public function withStyle(float $style): self
    {
        $self = clone $this;
        $self['style'] = $style;

        return $self;
    }

    /**
     * Determines how stable the voice is and the randomness between each generation. Lower values create a broader emotional range; higher values produce more consistent, monotonous output. Only applicable when using ElevenLabs.
     */
    public function withTemperature(float $temperature): self
    {
        $self = clone $this;
        $self['temperature'] = $temperature;

        return $self;
    }

    /**
     * Amplifies similarity to the original speaker voice. Increases computational load and latency slightly. Only applicable when using ElevenLabs.
     */
    public function withUseSpeakerBoost(bool $useSpeakerBoost): self
    {
        $self = clone $this;
        $self['useSpeakerBoost'] = $useSpeakerBoost;

        return $self;
    }

    /**
     * The speed of the voice in the range [0.25, 2.0]. 1.0 is deafult speed. Larger numbers make the voice faster, smaller numbers make it slower. This is only applicable for Telnyx Natural voices and Soniox voices (0.7 to 1.3 for Soniox).
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
