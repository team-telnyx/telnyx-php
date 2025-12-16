<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\AI\Assistants\Assistant;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory;
use Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings;
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
 * @phpstan-import-type AssistantShape from \Telnyx\AI\Assistants\Assistant
 * @phpstan-import-type InterruptionSettingsShape from \Telnyx\Calls\Actions\InterruptionSettings
 * @phpstan-import-type MessageHistoryShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\MessageHistory
 * @phpstan-import-type TranscriptionConfigShape from \Telnyx\Calls\Actions\TranscriptionConfig
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionGatherUsingAIParams\VoiceSettings
 *
 * @phpstan-type ActionGatherUsingAIParamsShape = array{
 *   parameters: array<string,mixed>,
 *   assistant?: AssistantShape|null,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   greeting?: string|null,
 *   interruptionSettings?: InterruptionSettingsShape|null,
 *   language?: null|GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage>,
 *   messageHistory?: list<MessageHistoryShape>|null,
 *   sendMessageHistoryUpdates?: bool|null,
 *   sendPartialResults?: bool|null,
 *   transcription?: TranscriptionConfigShape|null,
 *   userResponseTimeoutMs?: int|null,
 *   voice?: string|null,
 *   voiceSettings?: VoiceSettingsShape|null,
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
    #[Required(map: 'mixed')]
    public array $parameters;

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
     * @param array<string,mixed> $parameters
     * @param AssistantShape $assistant
     * @param InterruptionSettingsShape $interruptionSettings
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language
     * @param list<MessageHistoryShape> $messageHistory
     * @param TranscriptionConfigShape $transcription
     * @param VoiceSettingsShape $voiceSettings
     */
    public static function with(
        array $parameters,
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
        $self = new self;

        $self['parameters'] = $parameters;

        null !== $assistant && $self['assistant'] = $assistant;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $interruptionSettings && $self['interruptionSettings'] = $interruptionSettings;
        null !== $language && $self['language'] = $language;
        null !== $messageHistory && $self['messageHistory'] = $messageHistory;
        null !== $sendMessageHistoryUpdates && $self['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;
        null !== $sendPartialResults && $self['sendPartialResults'] = $sendPartialResults;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $userResponseTimeoutMs && $self['userResponseTimeoutMs'] = $userResponseTimeoutMs;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * The parameters described as a JSON Schema object that needs to be gathered by the voice assistant. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
     *
     * @param array<string,mixed> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * Assistant configuration including choice of LLM, custom instructions, and tools.
     *
     * @param AssistantShape $assistant
     */
    public function withAssistant(Assistant|array $assistant): self
    {
        $self = clone $this;
        $self['assistant'] = $assistant;

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
     * Text that will be played when the gathering starts, if none then nothing will be played when the gathering starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    public function withGreeting(string $greeting): self
    {
        $self = clone $this;
        $self['greeting'] = $greeting;

        return $self;
    }

    /**
     * Settings for handling user interruptions during assistant speech.
     *
     * @param InterruptionSettingsShape $interruptionSettings
     */
    public function withInterruptionSettings(
        InterruptionSettings|array $interruptionSettings
    ): self {
        $self = clone $this;
        $self['interruptionSettings'] = $interruptionSettings;

        return $self;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language
     */
    public function withLanguage(
        GoogleTranscriptionLanguage|string $language
    ): self {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The message history you want the voice assistant to be aware of, this can be useful to keep the context of the conversation, or to pass additional information to the voice assistant.
     *
     * @param list<MessageHistoryShape> $messageHistory
     */
    public function withMessageHistory(array $messageHistory): self
    {
        $self = clone $this;
        $self['messageHistory'] = $messageHistory;

        return $self;
    }

    /**
     * Default is `false`. If set to `true`, the voice assistant will send updates to the message history via the `call.ai_gather.message_history_updated` callback in real time as the message history is updated.
     */
    public function withSendMessageHistoryUpdates(
        bool $sendMessageHistoryUpdates
    ): self {
        $self = clone $this;
        $self['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;

        return $self;
    }

    /**
     * Default is `false`. If set to `true`, the voice assistant will send partial results via the `call.ai_gather.partial_results` callback in real time as individual fields are gathered. If set to `false`, the voice assistant will only send the final result via the `call.ai_gather.ended` callback.
     */
    public function withSendPartialResults(bool $sendPartialResults): self
    {
        $self = clone $this;
        $self['sendPartialResults'] = $sendPartialResults;

        return $self;
    }

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     *
     * @param TranscriptionConfigShape $transcription
     */
    public function withTranscription(
        TranscriptionConfig|array $transcription
    ): self {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * The number of milliseconds to wait for a user response before the voice assistant times out and check if the user is still there.
     */
    public function withUserResponseTimeoutMs(int $userResponseTimeoutMs): self
    {
        $self = clone $this;
        $self['userResponseTimeoutMs'] = $userResponseTimeoutMs;

        return $self;
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
        $self = clone $this;
        $self['voice'] = $voice;

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
