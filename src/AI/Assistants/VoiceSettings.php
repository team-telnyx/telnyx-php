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
 * @phpstan-import-type BackgroundAudioShape from \Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio
 *
 * @phpstan-type VoiceSettingsShape = array{
 *   voice: string,
 *   apiKeyRef?: string|null,
 *   backgroundAudio?: BackgroundAudioShape|null,
 *   voiceSpeed?: float|null,
 * }
 */
final class VoiceSettings implements BaseModel
{
    /** @use SdkModel<VoiceSettingsShape> */
    use SdkModel;

    /**
     * The voice to be used by the voice assistant. Check the full list of [available voices](https://developers.telnyx.com/api/call-control/list-text-to-speech-voices) via our voices API.
     * To use ElevenLabs, you must reference your ElevenLabs API key as an integration secret under the `api_key_ref` field. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. For Telnyx voices, use `Telnyx.<model_id>.<voice_id>` (e.g. Telnyx.KokoroTTS.af_heart).
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
     */
    #[Optional('background_audio', union: BackgroundAudio::class)]
    public PredefinedMedia|MediaURL|MediaName|null $backgroundAudio;

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
        ?float $voiceSpeed = null,
    ): self {
        $self = new self;

        $self['voice'] = $voice;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $backgroundAudio && $self['backgroundAudio'] = $backgroundAudio;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * The voice to be used by the voice assistant. Check the full list of [available voices](https://developers.telnyx.com/api/call-control/list-text-to-speech-voices) via our voices API.
     * To use ElevenLabs, you must reference your ElevenLabs API key as an integration secret under the `api_key_ref` field. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. For Telnyx voices, use `Telnyx.<model_id>.<voice_id>` (e.g. Telnyx.KokoroTTS.af_heart).
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
     * The speed of the voice in the range [0.25, 2.0]. 1.0 is deafult speed. Larger numbers make the voice faster, smaller numbers make it slower. This is only applicable for Telnyx Natural voices.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
