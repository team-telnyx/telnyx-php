<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaName;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\MediaURL;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BackgroundAudioVariants from \Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio
 * @phpstan-import-type BackgroundAudioShape from \Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio
 *
 * @phpstan-type VoiceSettingsShape = array{
 *   voice: string,
 *   apiKeyRef?: string|null,
 *   backgroundAudio?: BackgroundAudioShape|null,
 *   similarityBoost?: float|null,
 *   speed?: float|null,
 *   style?: float|null,
 *   temperature?: float|null,
 *   useSpeakerBoost?: bool|null,
 *   voiceSpeed?: float|null,
 * }
 */
final class VoiceSettings implements BaseModel
{
    /** @use SdkModel<VoiceSettingsShape> */
    use SdkModel;

    /**
     * The voice to be used by the voice assistant. Check the full list of [available voices](https://developers.telnyx.com/api/call-control/list-text-to-speech-voices) via our voices API.
     * To use ElevenLabs, you must reference your ElevenLabs API key as an integration secret under the `api_key_ref` field. See [integration secrets documentation](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for details. For Telnyx voices, use `Telnyx.<model_id>.<voice_id>` (e.g. Telnyx.KokoroTTS.af_heart).
     */
    #[Required]
    public string $voice;

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your ElevenLabs API key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * Optional background audio to play on the call. Use a predefined media bed, or supply a looped MP3 URL. If a media URL is chosen in the portal, customers can preview it before saving.
     *
     * @var BackgroundAudioVariants|null $backgroundAudio
     */
    #[Optional('background_audio', union: BackgroundAudio::class)]
    public PredefinedMedia|MediaURL|MediaName|null $backgroundAudio;

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
     * The speed of the voice in the range [0.25, 2.0]. 1.0 is deafult speed. Larger numbers make the voice faster, smaller numbers make it slower. This is only applicable for Telnyx Natural voices.
     */
    #[Optional('voice_speed')]
    public ?float $voiceSpeed;

    /**
     * `new VoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceSettings::with(voice: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceSettings)->withVoice(...)
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
     * @param BackgroundAudioShape|null $backgroundAudio
     */
    public static function with(
        string $voice,
        ?string $apiKeyRef = null,
        PredefinedMedia|array|MediaURL|MediaName|null $backgroundAudio = null,
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
        null !== $similarityBoost && $self['similarityBoost'] = $similarityBoost;
        null !== $speed && $self['speed'] = $speed;
        null !== $style && $self['style'] = $style;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $useSpeakerBoost && $self['useSpeakerBoost'] = $useSpeakerBoost;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * The voice to be used by the voice assistant. Check the full list of [available voices](https://developers.telnyx.com/api/call-control/list-text-to-speech-voices) via our voices API.
     * To use ElevenLabs, you must reference your ElevenLabs API key as an integration secret under the `api_key_ref` field. See [integration secrets documentation](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for details. For Telnyx voices, use `Telnyx.<model_id>.<voice_id>` (e.g. Telnyx.KokoroTTS.af_heart).
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your ElevenLabs API key. Warning: Free plans are unlikely to work with this integration.
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
        PredefinedMedia|array|MediaURL|MediaName $backgroundAudio
    ): self {
        $self = clone $this;
        $self['backgroundAudio'] = $backgroundAudio;

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
     * The speed of the voice in the range [0.25, 2.0]. 1.0 is deafult speed. Larger numbers make the voice faster, smaller numbers make it slower. This is only applicable for Telnyx Natural voices.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
