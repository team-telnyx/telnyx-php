<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\AI\Assistants\Assistant;
use Telnyx\AI\Assistants\Assistant\Tool\BookAppointment;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailability;
use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\RetrievalTool;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory\Role;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   parameters: mixed,
 *   assistant?: Assistant|array{
 *     instructions?: string|null,
 *     model?: string|null,
 *     openaiAPIKeyRef?: string|null,
 *     tools?: list<BookAppointment|CheckAvailability|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null,
 *   },
 *   clientState?: string,
 *   commandID?: string,
 *   greeting?: string,
 *   interruptionSettings?: InterruptionSettings|array{enable?: bool|null},
 *   language?: GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage>,
 *   messageHistory?: list<MessageHistory|array{
 *     content?: string|null, role?: value-of<Role>|null
 *   }>,
 *   sendMessageHistoryUpdates?: bool,
 *   sendPartialResults?: bool,
 *   transcription?: TranscriptionConfig|array{model?: string|null},
 *   userResponseTimeoutMs?: int,
 *   voice?: string,
 *   voiceSettings?: ElevenLabsVoiceSettings|array{
 *     type: value-of<Type>, apiKeyRef?: string|null
 *   }|TelnyxVoiceSettings|array{
 *     type: value-of<\Telnyx\Calls\Actions\TelnyxVoiceSettings\Type>,
 *     voiceSpeed?: float|null,
 *   }|AwsVoiceSettings|array{
 *     type: value-of<\Telnyx\Calls\Actions\AwsVoiceSettings\Type>
 *   },
 * }
 */
final class ActionGatherUsingAIParams implements BaseModel
{
    /** @use SdkModel<ActionGatherUsingAIParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    #[Required]
    public mixed $parameters;

    /**
     * Assistant configuration including choice of LLM, custom instructions, and tools.
     */
    #[Optional]
    public ?Assistant $assistant;

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
     * Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    #[Optional]
    public ?string $greeting;

    /**
     * Settings for handling user interruptions during assistant speech.
     */
    #[Optional('interruption_settings')]
    public ?InterruptionSettings $interruptionSettings;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<GoogleTranscriptionLanguage>|null $language
     */
    #[Optional(enum: GoogleTranscriptionLanguage::class)]
    public ?string $language;

    /**
     * The message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant.
     *
     * @var list<MessageHistory>|null $messageHistory
     */
    #[Optional('message_history', list: MessageHistory::class)]
    public ?array $messageHistory;

    /**
     * Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     */
    #[Optional('send_message_history_updates')]
    public ?bool $sendMessageHistoryUpdates;

    /**
     * Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     */
    #[Optional('send_partial_results')]
    public ?bool $sendPartialResults;

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     */
    #[Optional]
    public ?TranscriptionConfig $transcription;

    /**
     * The number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there.
     */
    #[Optional('user_response_timeout_ms')]
    public ?int $userResponseTimeoutMs;

    /**
     * The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     */
    #[Optional]
    public ?string $voice;

    /**
     * The settings associated with the voice selected.
     */
    #[Optional('voice_settings', union: VoiceSettings::class)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings;

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
     * @param Assistant|array{
     *   instructions?: string|null,
     *   model?: string|null,
     *   openaiAPIKeyRef?: string|null,
     *   tools?: list<BookAppointment|CheckAvailability|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null,
     * } $assistant
     * @param InterruptionSettings|array{enable?: bool|null} $interruptionSettings
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language
     * @param list<MessageHistory|array{
     *   content?: string|null, role?: value-of<Role>|null
     * }> $messageHistory
     * @param TranscriptionConfig|array{model?: string|null} $transcription
     * @param ElevenLabsVoiceSettings|array{
     *   type: value-of<Type>, apiKeyRef?: string|null
     * }|TelnyxVoiceSettings|array{
     *   type: value-of<TelnyxVoiceSettings\Type>,
     *   voiceSpeed?: float|null,
     * }|AwsVoiceSettings|array{
     *   type: value-of<AwsVoiceSettings\Type>
     * } $voiceSettings
     */
    public static function with(
        mixed $parameters,
        Assistant|array|null $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $greeting = null,
        InterruptionSettings|array|null $interruptionSettings = null,
        GoogleTranscriptionLanguage|string|null $language = null,
        ?array $messageHistory = null,
        ?bool $sendMessageHistoryUpdates = null,
        ?bool $sendPartialResults = null,
        TranscriptionConfig|array|null $transcription = null,
        ?int $userResponseTimeoutMs = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voiceSettings = null,
    ): self {
        $obj = new self;

        $obj['parameters'] = $parameters;

        null !== $assistant && $obj['assistant'] = $assistant;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $commandID && $obj['commandID'] = $commandID;
        null !== $greeting && $obj['greeting'] = $greeting;
        null !== $interruptionSettings && $obj['interruptionSettings'] = $interruptionSettings;
        null !== $language && $obj['language'] = $language;
        null !== $messageHistory && $obj['messageHistory'] = $messageHistory;
        null !== $sendMessageHistoryUpdates && $obj['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;
        null !== $sendPartialResults && $obj['sendPartialResults'] = $sendPartialResults;
        null !== $transcription && $obj['transcription'] = $transcription;
        null !== $userResponseTimeoutMs && $obj['userResponseTimeoutMs'] = $userResponseTimeoutMs;
        null !== $voice && $obj['voice'] = $voice;
        null !== $voiceSettings && $obj['voiceSettings'] = $voiceSettings;

        return $obj;
    }

    /**
     * The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     */
    public function withParameters(mixed $parameters): self
    {
        $obj = clone $this;
        $obj['parameters'] = $parameters;

        return $obj;
    }

    /**
     * Assistant configuration including choice of LLM, custom instructions, and tools.
     *
     * @param Assistant|array{
     *   instructions?: string|null,
     *   model?: string|null,
     *   openaiAPIKeyRef?: string|null,
     *   tools?: list<BookAppointment|CheckAvailability|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null,
     * } $assistant
     */
    public function withAssistant(Assistant|array $assistant): self
    {
        $obj = clone $this;
        $obj['assistant'] = $assistant;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['commandID'] = $commandID;

        return $obj;
    }

    /**
     * Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    public function withGreeting(string $greeting): self
    {
        $obj = clone $this;
        $obj['greeting'] = $greeting;

        return $obj;
    }

    /**
     * Settings for handling user interruptions during assistant speech.
     *
     * @param InterruptionSettings|array{enable?: bool|null} $interruptionSettings
     */
    public function withInterruptionSettings(
        InterruptionSettings|array $interruptionSettings
    ): self {
        $obj = clone $this;
        $obj['interruptionSettings'] = $interruptionSettings;

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
     * @param list<MessageHistory|array{
     *   content?: string|null, role?: value-of<Role>|null
     * }> $messageHistory
     */
    public function withMessageHistory(array $messageHistory): self
    {
        $obj = clone $this;
        $obj['messageHistory'] = $messageHistory;

        return $obj;
    }

    /**
     * Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     */
    public function withSendMessageHistoryUpdates(
        bool $sendMessageHistoryUpdates
    ): self {
        $obj = clone $this;
        $obj['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;

        return $obj;
    }

    /**
     * Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     */
    public function withSendPartialResults(bool $sendPartialResults): self
    {
        $obj = clone $this;
        $obj['sendPartialResults'] = $sendPartialResults;

        return $obj;
    }

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     *
     * @param TranscriptionConfig|array{model?: string|null} $transcription
     */
    public function withTranscription(
        TranscriptionConfig|array $transcription
    ): self {
        $obj = clone $this;
        $obj['transcription'] = $transcription;

        return $obj;
    }

    /**
     * The number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there.
     */
    public function withUserResponseTimeoutMs(int $userResponseTimeoutMs): self
    {
        $obj = clone $this;
        $obj['userResponseTimeoutMs'] = $userResponseTimeoutMs;

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
        $obj['voice'] = $voice;

        return $obj;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param ElevenLabsVoiceSettings|array{
     *   type: value-of<Type>, apiKeyRef?: string|null
     * }|TelnyxVoiceSettings|array{
     *   type: value-of<TelnyxVoiceSettings\Type>,
     *   voiceSpeed?: float|null,
     * }|AwsVoiceSettings|array{
     *   type: value-of<AwsVoiceSettings\Type>
     * } $voiceSettings
     */
    public function withVoiceSettings(
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings $voiceSettings,
    ): self {
        $obj = clone $this;
        $obj['voiceSettings'] = $voiceSettings;

        return $obj;
    }
}
