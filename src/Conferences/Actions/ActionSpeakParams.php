<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Conferences\Actions\ActionSpeakParams\Language;
use Telnyx\Conferences\Actions\ActionSpeakParams\PayloadType;
use Telnyx\Conferences\Actions\ActionSpeakParams\Region;
use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\ResembleVoiceSettings;
use Telnyx\RimeVoiceSettings;

/**
 * Convert text to speech and play it to all or some participants.
 *
 * @see Telnyx\Services\Conferences\ActionsService::speak()
 *
 * @phpstan-import-type VoiceSettingsVariants from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings
 *
 * @phpstan-type ActionSpeakParamsShape = array{
 *   payload: string,
 *   voice: string,
 *   callControlIDs?: list<string>|null,
 *   commandID?: string|null,
 *   language?: null|Language|value-of<Language>,
 *   payloadType?: null|PayloadType|value-of<PayloadType>,
 *   region?: null|Region|value-of<Region>,
 *   voiceSettings?: VoiceSettingsShape|null,
 * }
 */
final class ActionSpeakParams implements BaseModel
{
    /** @use SdkModel<ActionSpeakParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The text or SSML to be converted into speech. There is a 3,000 character limit.
     */
    #[Required]
    public string $payload;

    /**
     * Specifies the voice used in speech synthesis.
     *
     * - Define voices using the format `<Provider>.<Model>.<VoiceId>`. Specifying only the provider will give default values for voice_id and model_id.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>` (e.g., `Azure.en-CA-ClaraNeural`, `Azure.en-US-BrianMultilingualNeural`, `Azure.en-US-Ava:DragonHDLatestNeural`). For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery). Use `voice_settings` to configure custom deployments, regions, or API keys.
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     * - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>` (e.g., `Telnyx.KokoroTTS.af`). Use `voice_settings` to configure voice_speed and other synthesis parameters.
     * - **Minimax:** Use `Minimax.<ModelId>.<VoiceId>` (e.g., `Minimax.speech-02-hd.Wise_Woman`). Supported models: `speech-02-turbo`, `speech-02-hd`, `speech-2.6-turbo`, `speech-2.8-turbo`. Use `voice_settings` to configure speed, volume, pitch, and language_boost.
     * - **Rime:** Use `Rime.<model_id>.<voice_id>` (e.g., `Rime.Arcana.cove`). Supported model_ids: `Arcana`, `Mist`. Use `voice_settings` to configure voice_speed.
     * - **Resemble:** Use `Resemble.Turbo.<voice_id>` (e.g., `Resemble.Turbo.my_voice`). Only `Turbo` model is supported. Use `voice_settings` to configure precision, sample_rate, and format.
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     */
    #[Required]
    public string $voice;

    /**
     * Call Control IDs of participants who will hear the spoken text. When empty all participants will hear the spoken text.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Optional('call_control_ids', list: 'string')]
    public ?array $callControlIDs;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     *
     * @var value-of<PayloadType>|null $payloadType
     */
    #[Optional('payload_type', enum: PayloadType::class)]
    public ?string $payloadType;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * The settings associated with the voice selected.
     *
     * @var VoiceSettingsVariants|null $voiceSettings
     */
    #[Optional('voice_settings', union: VoiceSettings::class)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|null $voiceSettings;

    /**
     * `new ActionSpeakParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSpeakParams::with(payload: ..., voice: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSpeakParams)->withPayload(...)->withVoice(...)
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
     * @param list<string>|null $callControlIDs
     * @param Language|value-of<Language>|null $language
     * @param PayloadType|value-of<PayloadType>|null $payloadType
     * @param Region|value-of<Region>|null $region
     * @param VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        string $payload,
        string $voice,
        ?array $callControlIDs = null,
        ?string $commandID = null,
        Language|string|null $language = null,
        PayloadType|string|null $payloadType = null,
        Region|string|null $region = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['payload'] = $payload;
        $self['voice'] = $voice;

        null !== $callControlIDs && $self['callControlIDs'] = $callControlIDs;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $language && $self['language'] = $language;
        null !== $payloadType && $self['payloadType'] = $payloadType;
        null !== $region && $self['region'] = $region;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * The text or SSML to be converted into speech. There is a 3,000 character limit.
     */
    public function withPayload(string $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    /**
     * Specifies the voice used in speech synthesis.
     *
     * - Define voices using the format `<Provider>.<Model>.<VoiceId>`. Specifying only the provider will give default values for voice_id and model_id.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>` (e.g., `Azure.en-CA-ClaraNeural`, `Azure.en-US-BrianMultilingualNeural`, `Azure.en-US-Ava:DragonHDLatestNeural`). For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery). Use `voice_settings` to configure custom deployments, regions, or API keys.
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     * - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>` (e.g., `Telnyx.KokoroTTS.af`). Use `voice_settings` to configure voice_speed and other synthesis parameters.
     * - **Minimax:** Use `Minimax.<ModelId>.<VoiceId>` (e.g., `Minimax.speech-02-hd.Wise_Woman`). Supported models: `speech-02-turbo`, `speech-02-hd`, `speech-2.6-turbo`, `speech-2.8-turbo`. Use `voice_settings` to configure speed, volume, pitch, and language_boost.
     * - **Rime:** Use `Rime.<model_id>.<voice_id>` (e.g., `Rime.Arcana.cove`). Supported model_ids: `Arcana`, `Mist`. Use `voice_settings` to configure voice_speed.
     * - **Resemble:** Use `Resemble.Turbo.<voice_id>` (e.g., `Resemble.Turbo.my_voice`). Only `Turbo` model is supported. Use `voice_settings` to configure precision, sample_rate, and format.
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * Call Control IDs of participants who will hear the spoken text. When empty all participants will hear the spoken text.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $self = clone $this;
        $self['callControlIDs'] = $callControlIDs;

        return $self;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     *
     * @param PayloadType|value-of<PayloadType> $payloadType
     */
    public function withPayloadType(PayloadType|string $payloadType): self
    {
        $self = clone $this;
        $self['payloadType'] = $payloadType;

        return $self;
    }

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param VoiceSettingsShape $voiceSettings
     */
    public function withVoiceSettings(
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings $voiceSettings,
    ): self {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
