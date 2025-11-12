<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Conferences\Actions\ActionSpeakParams\Language;
use Telnyx\Conferences\Actions\ActionSpeakParams\PayloadType;
use Telnyx\Conferences\Actions\ActionSpeakParams\Region;
use Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Convert text to speech and play it to all or some participants.
 *
 * @see Telnyx\Services\Conferences\ActionsService::speak()
 *
 * @phpstan-type ActionSpeakParamsShape = array{
 *   payload: string,
 *   voice: string,
 *   call_control_ids?: list<string>,
 *   command_id?: string,
 *   language?: Language|value-of<Language>,
 *   payload_type?: PayloadType|value-of<PayloadType>,
 *   region?: Region|value-of<Region>,
 *   voice_settings?: mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings,
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
     * Call Control IDs of participants who will hear the spoken text. When empty all participants will hear the spoken text.
     *
     * @var list<string>|null $call_control_ids
     */
    #[Api(list: 'string', optional: true)]
    public ?array $call_control_ids;

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * The language you want spoken. This parameter is ignored when a `Polly.*` voice is specified.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
     *
     * @var value-of<PayloadType>|null $payload_type
     */
    #[Api(enum: PayloadType::class, optional: true)]
    public ?string $payload_type;

    /**
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @var value-of<Region>|null $region
     */
    #[Api(enum: Region::class, optional: true)]
    public ?string $region;

    /**
     * The settings associated with the voice selected.
     *
     * @var mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings|null $voice_settings
     */
    #[Api(union: VoiceSettings::class, optional: true)]
    public mixed $voice_settings;

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
     * @param list<string> $call_control_ids
     * @param Language|value-of<Language> $language
     * @param PayloadType|value-of<PayloadType> $payload_type
     * @param Region|value-of<Region> $region
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voice_settings
     */
    public static function with(
        string $payload,
        string $voice,
        ?array $call_control_ids = null,
        ?string $command_id = null,
        Language|string|null $language = null,
        PayloadType|string|null $payload_type = null,
        Region|string|null $region = null,
        mixed $voice_settings = null,
    ): self {
        $obj = new self;

        $obj->payload = $payload;
        $obj->voice = $voice;

        null !== $call_control_ids && $obj->call_control_ids = $call_control_ids;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $language && $obj['language'] = $language;
        null !== $payload_type && $obj['payload_type'] = $payload_type;
        null !== $region && $obj['region'] = $region;
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
     * Call Control IDs of participants who will hear the spoken text. When empty all participants will hear the spoken text.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $obj = clone $this;
        $obj->call_control_ids = $callControlIDs;

        return $obj;
    }

    /**
     * Use this field to avoid execution of duplicate commands. Telnyx will ignore subsequent commands with the same `command_id` as one that has already been executed.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

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
     * Region where the conference data is located. Defaults to the region defined in user's data locality settings (Europe or US).
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

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
        $obj->voice_settings = $voiceSettings;

        return $obj;
    }
}
