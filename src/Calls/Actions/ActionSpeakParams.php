<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionSpeakParams\Language;
use Telnyx\Calls\Actions\ActionSpeakParams\PayloadType;
use Telnyx\Calls\Actions\ActionSpeakParams\ServiceLevel;
use Telnyx\Calls\Actions\ActionSpeakParams\VoiceSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Convert text to speech and play it back on the call. If multiple speak text commands are issued consecutively, the audio files will be placed in a queue awaiting playback.
 *
 * **Expected Webhooks:**
 *
 * - `call.speak.started`
 * - `call.speak.ended`
 *
 * @see Telnyx\Services\Calls\ActionsService::speak()
 *
 * @phpstan-import-type VoiceSettingsVariants from \Telnyx\Calls\Actions\ActionSpeakParams\VoiceSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionSpeakParams\VoiceSettings
 *
 * @phpstan-type ActionSpeakParamsShape = array{
 *   payload: string,
 *   voice: string,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   language?: null|Language|value-of<Language>,
 *   payloadType?: null|PayloadType|value-of<PayloadType>,
 *   serviceLevel?: null|ServiceLevel|value-of<ServiceLevel>,
 *   stop?: string|null,
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
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     *
     * For service_level basic, you may define the gender of the speaker (male or female).
     */
    #[Required]
    public string $voice;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
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
     * This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     *
     * @var value-of<ServiceLevel>|null $serviceLevel
     */
    #[Optional('service_level', enum: ServiceLevel::class)]
    public ?string $serviceLevel;

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    #[Optional]
    public ?string $stop;

    /**
     * The settings associated with the voice selected.
     *
     * @var VoiceSettingsVariants|null $voiceSettings
     */
    #[Optional('voice_settings', union: VoiceSettings::class)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings;

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
     * @param Language|value-of<Language>|null $language
     * @param PayloadType|value-of<PayloadType>|null $payloadType
     * @param ServiceLevel|value-of<ServiceLevel>|null $serviceLevel
     * @param VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        string $payload,
        string $voice,
        ?string $clientState = null,
        ?string $commandID = null,
        Language|string|null $language = null,
        PayloadType|string|null $payloadType = null,
        ServiceLevel|string|null $serviceLevel = null,
        ?string $stop = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['payload'] = $payload;
        $self['voice'] = $voice;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $language && $self['language'] = $language;
        null !== $payloadType && $self['payloadType'] = $payloadType;
        null !== $serviceLevel && $self['serviceLevel'] = $serviceLevel;
        null !== $stop && $self['stop'] = $stop;
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
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.eleven_multilingual_v2.21m00Tcm4TlvDq8ikWAM`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration identifier secret in `"voice_settings": {"api_key_ref": "<secret_identifier>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
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
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
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
     * This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     *
     * @param ServiceLevel|value-of<ServiceLevel> $serviceLevel
     */
    public function withServiceLevel(ServiceLevel|string $serviceLevel): self
    {
        $self = clone $this;
        $self['serviceLevel'] = $serviceLevel;

        return $self;
    }

    /**
     * When specified, it stops the current audio being played. Specify `current` to stop the current audio being played, and to play the next file in the queue. Specify `all` to stop the current audio file being played and to also clear all audio files from the queue.
     */
    public function withStop(string $stop): self
    {
        $self = clone $this;
        $self['stop'] = $stop;

        return $self;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param VoiceSettingsShape $voiceSettings
     */
    public function withVoiceSettings(
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings $voiceSettings,
    ): self {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
