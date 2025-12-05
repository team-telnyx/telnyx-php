<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\Language;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\PayloadType;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\ServiceLevel;
use Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\VoiceSettings;
use Telnyx\Core\Attributes\Api;
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
 * @phpstan-type ActionGatherUsingSpeakParamsShape = array{
 *   payload: string,
 *   voice: string,
 *   client_state?: string,
 *   command_id?: string,
 *   inter_digit_timeout_millis?: int,
 *   invalid_payload?: string,
 *   language?: Language|value-of<Language>,
 *   maximum_digits?: int,
 *   maximum_tries?: int,
 *   minimum_digits?: int,
 *   payload_type?: PayloadType|value-of<PayloadType>,
 *   service_level?: ServiceLevel|value-of<ServiceLevel>,
 *   terminating_digit?: string,
 *   timeout_millis?: int,
 *   valid_digits?: string,
 *   voice_settings?: ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings,
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
    #[Api]
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
    #[Api]
    public string $voice;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Api(optional: true)]
    public ?int $inter_digit_timeout_millis;

    /**
     * The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     */
    #[Api(optional: true)]
    public ?string $invalid_payload;

    /**
     * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    #[Api(optional: true)]
    public ?int $maximum_digits;

    /**
     * The maximum number of times that a file should be played back if there is no input from the user on the call.
     */
    #[Api(optional: true)]
    public ?int $maximum_tries;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Api(optional: true)]
    public ?int $minimum_digits;

    /**
     * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     *
     * @var value-of<PayloadType>|null $payload_type
     */
    #[Api(enum: PayloadType::class, optional: true)]
    public ?string $payload_type;

    /**
     * This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     *
     * @var value-of<ServiceLevel>|null $service_level
     */
    #[Api(enum: ServiceLevel::class, optional: true)]
    public ?string $service_level;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Api(optional: true)]
    public ?string $terminating_digit;

    /**
     * The number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file.
     */
    #[Api(optional: true)]
    public ?int $timeout_millis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Api(optional: true)]
    public ?string $valid_digits;

    /**
     * The settings associated with the voice selected.
     */
    #[Api(union: VoiceSettings::class, optional: true)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|null $voice_settings;

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
     * @param PayloadType|value-of<PayloadType> $payload_type
     * @param ServiceLevel|value-of<ServiceLevel> $service_level
     */
    public static function with(
        string $payload,
        string $voice,
        ?string $client_state = null,
        ?string $command_id = null,
        ?int $inter_digit_timeout_millis = null,
        ?string $invalid_payload = null,
        Language|string|null $language = null,
        ?int $maximum_digits = null,
        ?int $maximum_tries = null,
        ?int $minimum_digits = null,
        PayloadType|string|null $payload_type = null,
        ServiceLevel|string|null $service_level = null,
        ?string $terminating_digit = null,
        ?int $timeout_millis = null,
        ?string $valid_digits = null,
        ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|null $voice_settings = null,
    ): self {
        $obj = new self;

        $obj->payload = $payload;
        $obj->voice = $voice;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $inter_digit_timeout_millis && $obj->inter_digit_timeout_millis = $inter_digit_timeout_millis;
        null !== $invalid_payload && $obj->invalid_payload = $invalid_payload;
        null !== $language && $obj['language'] = $language;
        null !== $maximum_digits && $obj->maximum_digits = $maximum_digits;
        null !== $maximum_tries && $obj->maximum_tries = $maximum_tries;
        null !== $minimum_digits && $obj->minimum_digits = $minimum_digits;
        null !== $payload_type && $obj['payload_type'] = $payload_type;
        null !== $service_level && $obj['service_level'] = $service_level;
        null !== $terminating_digit && $obj->terminating_digit = $terminating_digit;
        null !== $timeout_millis && $obj->timeout_millis = $timeout_millis;
        null !== $valid_digits && $obj->valid_digits = $valid_digits;
        null !== $voice_settings && $obj->voice_settings = $voice_settings;

        return $obj;
    }

    /**
     * The text or SSML to be converted into speech. There is a 3,000 character limit.
     */
    public function withPayload(string $payload): self
    {
        $obj = clone $this;
        $obj->payload = $payload;

        return $obj;
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
        $obj = clone $this;
        $obj->voice = $voice;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $obj = clone $this;
        $obj->inter_digit_timeout_millis = $interDigitTimeoutMillis;

        return $obj;
    }

    /**
     * The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     */
    public function withInvalidPayload(string $invalidPayload): self
    {
        $obj = clone $this;
        $obj->invalid_payload = $invalidPayload;

        return $obj;
    }

    /**
     * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * The maximum number of digits to fetch. This parameter has a maximum value of 128.
     */
    public function withMaximumDigits(int $maximumDigits): self
    {
        $obj = clone $this;
        $obj->maximum_digits = $maximumDigits;

        return $obj;
    }

    /**
     * The maximum number of times that a file should be played back if there is no input from the user on the call.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $obj = clone $this;
        $obj->maximum_tries = $maximumTries;

        return $obj;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $obj = clone $this;
        $obj->minimum_digits = $minimumDigits;

        return $obj;
    }

    /**
     * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     *
     * @param PayloadType|value-of<PayloadType> $payloadType
     */
    public function withPayloadType(PayloadType|string $payloadType): self
    {
        $obj = clone $this;
        $obj['payload_type'] = $payloadType;

        return $obj;
    }

    /**
     * This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     *
     * @param ServiceLevel|value-of<ServiceLevel> $serviceLevel
     */
    public function withServiceLevel(ServiceLevel|string $serviceLevel): self
    {
        $obj = clone $this;
        $obj['service_level'] = $serviceLevel;

        return $obj;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $obj = clone $this;
        $obj->terminating_digit = $terminatingDigit;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $obj = clone $this;
        $obj->timeout_millis = $timeoutMillis;

        return $obj;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $obj = clone $this;
        $obj->valid_digits = $validDigits;

        return $obj;
    }

    /**
     * The settings associated with the voice selected.
     */
    public function withVoiceSettings(
        ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings $voiceSettings
    ): self {
        $obj = clone $this;
        $obj->voice_settings = $voiceSettings;

        return $obj;
    }
}
