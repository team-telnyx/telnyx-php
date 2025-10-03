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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionGatherUsingSpeakParams); // set properties as needed
 * $client->calls.actions->gatherUsingSpeak(...$params->toArray());
 * ```
 * Convert text to speech and play it on the call until the required DTMF signals are gathered to build interactive menus.
 *
 * You can pass a list of valid digits along with an 'invalid_payload', which will be played back at the beginning of each prompt. Speech will be interrupted when a DTMF signal is received. The `Answer` command must be issued before the `gather_using_speak` command.
 *
 * **Expected Webhooks:**
 *
 * - `call.dtmf.received` (you may receive many of these webhooks)
 * - `call.gather.ended`
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->gatherUsingSpeak(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->gatherUsingSpeak
 *
 * @phpstan-type action_gather_using_speak_params = array{
 *   payload: string,
 *   voice: string,
 *   clientState?: string,
 *   commandID?: string,
 *   interDigitTimeoutMillis?: int,
 *   invalidPayload?: string,
 *   language?: Language|value-of<Language>,
 *   maximumDigits?: int,
 *   maximumTries?: int,
 *   minimumDigits?: int,
 *   payloadType?: PayloadType|value-of<PayloadType>,
 *   serviceLevel?: ServiceLevel|value-of<ServiceLevel>,
 *   terminatingDigit?: string,
 *   timeoutMillis?: int,
 *   validDigits?: string,
 *   voiceSettings?: mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings,
 * }
 */
final class ActionGatherUsingSpeakParams implements BaseModel
{
    /** @use SdkModel<action_gather_using_speak_params> */
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
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * The number of milliseconds to wait for input between digits.
     */
    #[Api('inter_digit_timeout_millis', optional: true)]
    public ?int $interDigitTimeoutMillis;

    /**
     * The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     */
    #[Api('invalid_payload', optional: true)]
    public ?string $invalidPayload;

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
    #[Api('maximum_digits', optional: true)]
    public ?int $maximumDigits;

    /**
     * The maximum number of times that a file should be played back if there is no input from the user on the call.
     */
    #[Api('maximum_tries', optional: true)]
    public ?int $maximumTries;

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    #[Api('minimum_digits', optional: true)]
    public ?int $minimumDigits;

    /**
     * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     *
     * @var value-of<PayloadType>|null $payloadType
     */
    #[Api('payload_type', enum: PayloadType::class, optional: true)]
    public ?string $payloadType;

    /**
     * This parameter impacts speech quality, language options and payload types. When using `basic`, only the `en-US` language and payload type `text` are allowed.
     *
     * @var value-of<ServiceLevel>|null $serviceLevel
     */
    #[Api('service_level', enum: ServiceLevel::class, optional: true)]
    public ?string $serviceLevel;

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    #[Api('terminating_digit', optional: true)]
    public ?string $terminatingDigit;

    /**
     * The number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file.
     */
    #[Api('timeout_millis', optional: true)]
    public ?int $timeoutMillis;

    /**
     * A list of all digits accepted as valid.
     */
    #[Api('valid_digits', optional: true)]
    public ?string $validDigits;

    /**
     * The settings associated with the voice selected.
     *
     * @var mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings|null $voiceSettings
     */
    #[Api('voice_settings', union: VoiceSettings::class, optional: true)]
    public mixed $voiceSettings;

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
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings
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
        mixed $voiceSettings = null,
    ): self {
        $obj = new self;

        $obj->payload = $payload;
        $obj->voice = $voice;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $interDigitTimeoutMillis && $obj->interDigitTimeoutMillis = $interDigitTimeoutMillis;
        null !== $invalidPayload && $obj->invalidPayload = $invalidPayload;
        null !== $language && $obj['language'] = $language;
        null !== $maximumDigits && $obj->maximumDigits = $maximumDigits;
        null !== $maximumTries && $obj->maximumTries = $maximumTries;
        null !== $minimumDigits && $obj->minimumDigits = $minimumDigits;
        null !== $payloadType && $obj['payloadType'] = $payloadType;
        null !== $serviceLevel && $obj['serviceLevel'] = $serviceLevel;
        null !== $terminatingDigit && $obj->terminatingDigit = $terminatingDigit;
        null !== $timeoutMillis && $obj->timeoutMillis = $timeoutMillis;
        null !== $validDigits && $obj->validDigits = $validDigits;
        null !== $voiceSettings && $obj->voiceSettings = $voiceSettings;

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
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for input between digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $obj = clone $this;
        $obj->interDigitTimeoutMillis = $interDigitTimeoutMillis;

        return $obj;
    }

    /**
     * The text or SSML to be converted into speech when digits don't match the `valid_digits` parameter or the number of digits is not between `min` and `max`. There is a 3,000 character limit.
     */
    public function withInvalidPayload(string $invalidPayload): self
    {
        $obj = clone $this;
        $obj->invalidPayload = $invalidPayload;

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
        $obj->maximumDigits = $maximumDigits;

        return $obj;
    }

    /**
     * The maximum number of times that a file should be played back if there is no input from the user on the call.
     */
    public function withMaximumTries(int $maximumTries): self
    {
        $obj = clone $this;
        $obj->maximumTries = $maximumTries;

        return $obj;
    }

    /**
     * The minimum number of digits to fetch. This parameter has a minimum value of 1.
     */
    public function withMinimumDigits(int $minimumDigits): self
    {
        $obj = clone $this;
        $obj->minimumDigits = $minimumDigits;

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
        $obj['payloadType'] = $payloadType;

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
        $obj['serviceLevel'] = $serviceLevel;

        return $obj;
    }

    /**
     * The digit used to terminate input if fewer than `maximum_digits` digits have been gathered.
     */
    public function withTerminatingDigit(string $terminatingDigit): self
    {
        $obj = clone $this;
        $obj->terminatingDigit = $terminatingDigit;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for a DTMF response after speak ends before a replaying the sound file.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $obj = clone $this;
        $obj->timeoutMillis = $timeoutMillis;

        return $obj;
    }

    /**
     * A list of all digits accepted as valid.
     */
    public function withValidDigits(string $validDigits): self
    {
        $obj = clone $this;
        $obj->validDigits = $validDigits;

        return $obj;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings
     */
    public function withVoiceSettings(mixed $voiceSettings): self
    {
        $obj = clone $this;
        $obj->voiceSettings = $voiceSettings;

        return $obj;
    }
}
