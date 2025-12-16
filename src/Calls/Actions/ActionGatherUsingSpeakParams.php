<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\Language;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\PayloadType;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\ServiceLevel;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\VoiceSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Convert text to speech and play it on the call until the required DTMF signals are gathered to build interactive menus.
 *
 * You can pass a list of valid digits along with an 'invalid_payload', which will be played back at the beginning of each prompt. Speech will be interrupted when a DTMF signal is received. The `Answer` command must be issued before the `gather_using_speak` command.
 *
 * **Expected Webhooks:**
 *
 * - `call.dtmf.received` (you may receive many of these webhooks)
 * - `call.gather.ended`
 *
 * @see Telnyx\Services\Calls\ActionsService::gatherUsingSpeak()
 *
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\VoiceSettings
 *
 * @phpstan-type ActionGatherUsingSpeakParamsShape = array{
 *   payload: string,
 *   voice: string,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   interDigitTimeoutMillis?: int|null,
 *   invalidPayload?: string|null,
 *   language?: null|Language|value-of<Language>,
 *   maximumDigits?: int|null,
 *   maximumTries?: int|null,
 *   minimumDigits?: int|null,
 *   payloadType?: null|PayloadType|value-of<PayloadType>,
 *   serviceLevel?: null|ServiceLevel|value-of<ServiceLevel>,
 *   terminatingDigit?: string|null,
 *   timeoutMillis?: int|null,
 *   validDigits?: string|null,
 *   voiceSettings?: VoiceSettingsShape|null,
 * }
 */
final class ActionGatherUsingSpeakParams implements BaseModel
{
    /** @use SdkModel<ActionGatherUsingSpeakParamsShape> */
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
     * The number of milliseconds to wait for input between digits.
     */
    #[Optional('inter_digit_timeout_millis')]
    public ?int $interDigitTimeoutMillis;

    /**
     * The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     */
    #[Optional('invalid_payload')]
    public ?string $invalidPayload;

    /**
     * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Optional('maximum_digits')]
    public ?int $maximumDigits;

    /**
     * The maximum number of times that a file should be played back if there is no input from the user on the call.
     */
    #[Optional('maximum_tries')]
    public ?int $maximumTries;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Optional('minimum_digits')]
    public ?int $minimumDigits;

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
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Optional('terminating_digit')]
    public ?string $terminatingDigit;

    /**
     * The number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file.
     */
    #[Optional('timeout_millis')]
    public ?int $timeoutMillis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Optional('valid_digits')]
    public ?string $validDigits;

    /**
     * The settings associated with the voice selected.
     */
    #[Optional('voice_settings', union: VoiceSettings::class)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings;

    /**
     * `new ActionGatherUsingSpeakParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionGatherUsingSpeakParams::with(payload: ..., voice: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionGatherUsingSpeakParams)->withPayload(...)->withVoice(...)
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
     * @param Language|value-of<Language> $language
     * @param PayloadType|value-of<PayloadType> $payloadType
     * @param ServiceLevel|value-of<ServiceLevel> $serviceLevel
     * @param VoiceSettingsShape $voiceSettings
     */
    public static function with(
        string $payload,
        string $voice,
        ?string $clientState = null,
        ?string $commandID = null,
        ?int $interDigitTimeoutMillis = null,
        ?string $invalidPayload = null,
        Language|string|null $language = null,
        ?int $maximumDigits = null,
        ?int $maximumTries = null,
        ?int $minimumDigits = null,
        PayloadType|string|null $payloadType = null,
        ServiceLevel|string|null $serviceLevel = null,
        ?string $terminatingDigit = null,
        ?int $timeoutMillis = null,
        ?string $validDigits = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['payload'] = $payload;
        $self['voice'] = $voice;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $interDigitTimeoutMillis && $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;
        null !== $invalidPayload && $self['invalidPayload'] = $invalidPayload;
        null !== $language && $self['language'] = $language;
        null !== $maximumDigits && $self['maximumDigits'] = $maximumDigits;
        null !== $maximumTries && $self['maximumTries'] = $maximumTries;
        null !== $minimumDigits && $self['minimumDigits'] = $minimumDigits;
        null !== $payloadType && $self['payloadType'] = $payloadType;
        null !== $serviceLevel && $self['serviceLevel'] = $serviceLevel;
        null !== $terminatingDigit && $self['terminatingDigit'] = $terminatingDigit;
        null !== $timeoutMillis && $self['timeoutMillis'] = $timeoutMillis;
        null !== $validDigits && $self['validDigits'] = $validDigits;
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
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $self = clone $this;
        $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;

        return $self;
    }

    /**
     * The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     */
    public function withInvalidPayload(string $invalidPayload): self
    {
        $self = clone $this;
        $self['invalidPayload'] = $invalidPayload;

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
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $self = clone $this;
        $self['maximumDigits'] = $maximumDigits;

        return $self;
    }

    /**
     * The maximum number of times that a file should be played back if there is no input from the user on the call.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $self = clone $this;
        $self['maximumTries'] = $maximumTries;

        return $self;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $self = clone $this;
        $self['minimumDigits'] = $minimumDigits;

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
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $self = clone $this;
        $self['terminatingDigit'] = $terminatingDigit;

        return $self;
    }

    /**
     * The number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $self = clone $this;
        $self['timeoutMillis'] = $timeoutMillis;

        return $self;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $self = clone $this;
        $self['validDigits'] = $validDigits;

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
