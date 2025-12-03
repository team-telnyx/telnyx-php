<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\AI\Assistants\Assistant;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Gather parameters defined in the request payload using a voice assistant.
 *
 *  You can pass parameters described as a JSON Schema object and the voice assistant will attempt to gather these informations.
 *
 * **Expected Webhooks:**
 *
 * - `call.ai_gather.ended`
 * - `call.conversation.ended`
 * - `call.ai_gather.partial_results` (if `send_partial_results` is set to `true`)
 * - `call.ai_gather.message_history_updated` (if `send_message_history_updates` is set to `true`)
 *
 * @see Telnyx\Services\Calls\ActionsService::gatherUsingAI()
 *
 * @phpstan-type ActionGatherUsingAIParamsShape = array{
 *   parameters: array<string,mixed>,
 *   assistant?: Assistant,
 *   client_state?: string,
 *   command_id?: string,
 *   greeting?: string,
 *   interruption_settings?: InterruptionSettings,
 *   language?: GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage>,
 *   message_history?: list<MessageHistory>,
 *   send_message_history_updates?: bool,
 *   send_partial_results?: bool,
 *   transcription?: TranscriptionConfig,
 *   user_response_timeout_ms?: int,
 *   voice?: string,
 *   voice_settings?: ElevenLabsVoiceSettings|TelnyxVoiceSettings|array<string,mixed>,
 * }
 */
final class ActionGatherUsingAIParams implements BaseModel
{
    /** @use SdkModel<ActionGatherUsingAIParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @var array<string,mixed> $parameters
     */
    #[Api(map: 'mixed')]
    public array $parameters;

    /**
     * Assistant configuration including choice of LLM, custom instructions, and tools.
     */
    #[Api(optional: true)]
    public ?Assistant $assistant;

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
     * Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    #[Api(optional: true)]
    public ?string $greeting;

    /**
     * Settings for handling user interruptions during assistant speech.
     */
    #[Api(optional: true)]
    public ?InterruptionSettings $interruption_settings;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<GoogleTranscriptionLanguage>|null $language
     */
    #[Api(enum: GoogleTranscriptionLanguage::class, optional: true)]
    public ?string $language;

    /**
     * The message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant.
     *
     * @var list<MessageHistory>|null $message_history
     */
    #[Api(list: MessageHistory::class, optional: true)]
    public ?array $message_history;

    /**
     * Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     */
    #[Api(optional: true)]
    public ?bool $send_message_history_updates;

    /**
     * Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     */
    #[Api(optional: true)]
    public ?bool $send_partial_results;

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     */
    #[Api(optional: true)]
    public ?TranscriptionConfig $transcription;

    /**
     * The number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there.
     */
    #[Api(optional: true)]
    public ?int $user_response_timeout_ms;

    /**
     * The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     */
    #[Api(optional: true)]
    public ?string $voice;

    /**
     * The settings associated with the voice selected.
     *
     * @var ElevenLabsVoiceSettings|TelnyxVoiceSettings|array<string,mixed>|null $voice_settings
     */
    #[Api(union: VoiceSettings::class, optional: true)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|array|null $voice_settings;

    /**
     * `new ActionGatherUsingAIParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionGatherUsingAIParams::with(parameters: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionGatherUsingAIParams)->withParameters(...)
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
     * @param array<string,mixed> $parameters
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language
     * @param list<MessageHistory> $message_history
     * @param ElevenLabsVoiceSettings|TelnyxVoiceSettings|array<string,mixed> $voice_settings
     */
    public static function with(
        array $parameters,
        ?Assistant $assistant = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $greeting = null,
        ?InterruptionSettings $interruption_settings = null,
        GoogleTranscriptionLanguage|string|null $language = null,
        ?array $message_history = null,
        ?bool $send_message_history_updates = null,
        ?bool $send_partial_results = null,
        ?TranscriptionConfig $transcription = null,
        ?int $user_response_timeout_ms = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|TelnyxVoiceSettings|array|null $voice_settings = null,
    ): self {
        $obj = new self;

        $obj->parameters = $parameters;

        null !== $assistant && $obj->assistant = $assistant;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $greeting && $obj->greeting = $greeting;
        null !== $interruption_settings && $obj->interruption_settings = $interruption_settings;
        null !== $language && $obj['language'] = $language;
        null !== $message_history && $obj->message_history = $message_history;
        null !== $send_message_history_updates && $obj->send_message_history_updates = $send_message_history_updates;
        null !== $send_partial_results && $obj->send_partial_results = $send_partial_results;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $user_response_timeout_ms && $obj->user_response_timeout_ms = $user_response_timeout_ms;
        null !== $voice && $obj->voice = $voice;
        null !== $voice_settings && $obj->voice_settings = $voice_settings;

        return $obj;
    }

    /**
     * The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param array<string,mixed> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj->parameters = $parameters;

        return $obj;
    }

    /**
     * Assistant configuration including choice of LLM, custom instructions, and tools.
     */
    public function withAssistant(Assistant $assistant): self
    {
        $obj = clone $this;
        $obj->assistant = $assistant;

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
     * Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    public function withGreeting(string $greeting): self
    {
        $obj = clone $this;
        $obj->greeting = $greeting;

        return $obj;
    }

    /**
     * Settings for handling user interruptions during assistant speech.
     */
    public function withInterruptionSettings(
        InterruptionSettings $interruptionSettings
    ): self {
        $obj = clone $this;
        $obj->interruption_settings = $interruptionSettings;

        return $obj;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language
     */
    public function withLanguage(
        GoogleTranscriptionLanguage|string $language
    ): self {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * The message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant.
     *
     * @param list<MessageHistory> $messageHistory
     */
    public function withMessageHistory(array $messageHistory): self
    {
        $obj = clone $this;
        $obj->message_history = $messageHistory;

        return $obj;
    }

    /**
     * Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     */
    public function withSendMessageHistoryUpdates(
        bool $sendMessageHistoryUpdates
    ): self {
        $obj = clone $this;
        $obj->send_message_history_updates = $sendMessageHistoryUpdates;

        return $obj;
    }

    /**
     * Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     */
    public function withSendPartialResults(bool $sendPartialResults): self
    {
        $obj = clone $this;
        $obj->send_partial_results = $sendPartialResults;

        return $obj;
    }

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     */
    public function withTranscription(TranscriptionConfig $transcription): self
    {
        $obj = clone $this;
        $obj->transcription = $transcription;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there.
     */
    public function withUserResponseTimeoutMs(int $userResponseTimeoutMs): self
    {
        $obj = clone $this;
        $obj->user_response_timeout_ms = $userResponseTimeoutMs;

        return $obj;
    }

    /**
     * The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     */
    public function withVoice(string $voice): self
    {
        $obj = clone $this;
        $obj->voice = $voice;

        return $obj;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param ElevenLabsVoiceSettings|TelnyxVoiceSettings|array<string,mixed> $voiceSettings
     */
    public function withVoiceSettings(
        ElevenLabsVoiceSettings|TelnyxVoiceSettings|array $voiceSettings
    ): self {
        $obj = clone $this;
        $obj->voice_settings = $voiceSettings;

        return $obj;
    }
}
