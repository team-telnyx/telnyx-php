<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\Assistant;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\Language;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\Participant;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\Transcription;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings\XaiVoiceSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ResembleVoiceSettings;
use Telnyx\RimeVoiceSettings;

/**
 * Start a Conversation Relay session on an active call. Conversation Relay connects the call audio to your WebSocket so your application can exchange realtime messages with the caller while Telnyx handles speech recognition and text-to-speech. Only one AI Assistant or Conversation Relay session can be active on a call at a time.
 *
 * **Expected Webhooks:**
 *
 * - `call.conversation.ended` - Sent when the Conversation Relay session ends. If the customer WebSocket disconnects, the webhook payload `reason` is `customer_disconnect`.
 *
 * @see Telnyx\Services\Calls\ActionsService::startConversationRelay()
 *
 * @phpstan-import-type VoiceSettingsVariants from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings
 * @phpstan-import-type AssistantShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\Assistant
 * @phpstan-import-type InterruptionSettingsShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings
 * @phpstan-import-type LanguageShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\Language
 * @phpstan-import-type ParticipantShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\Participant
 * @phpstan-import-type TranscriptionShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\Transcription
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings
 *
 * @phpstan-type ActionStartConversationRelayParamsShape = array{
 *   conversationRelayURL: string,
 *   assistant?: null|Assistant|AssistantShape,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   conversationRelayDtmfDetection?: bool|null,
 *   greeting?: string|null,
 *   interruptionSettings?: null|\Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings|InterruptionSettingsShape,
 *   language?: string|null,
 *   languages?: list<Language|LanguageShape>|null,
 *   participants?: list<Participant|ParticipantShape>|null,
 *   sendMessageHistoryUpdates?: bool|null,
 *   transcription?: null|Transcription|TranscriptionShape,
 *   transcriptionLanguage?: string|null,
 *   ttsLanguage?: string|null,
 *   userResponseTimeoutMs?: int|null,
 *   voice?: string|null,
 *   voiceSettings?: VoiceSettingsShape|null,
 * }
 */
final class ActionStartConversationRelayParams implements BaseModel
{
    /** @use SdkModel<ActionStartConversationRelayParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    #[Required('conversation_relay_url')]
    public string $conversationRelayURL;

    /**
     * Custom parameters for the Conversation Relay session. Pass key-value data as `assistant.dynamic_variables` to make it available to the relay session.
     */
    #[Optional]
    public ?Assistant $assistant;

    /**
     * Use this field to add state to subsequent webhooks. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Enable DTMF detection for the relay session.
     */
    #[Optional('conversation_relay_dtmf_detection')]
    public ?bool $conversationRelayDtmfDetection;

    /**
     * Text played when the relay session starts.
     */
    #[Optional]
    public ?string $greeting;

    /**
     * Settings for handling caller interruptions during Conversation Relay speech.
     */
    #[Optional('interruption_settings')]
    public ?InterruptionSettings $interruptionSettings;

    /**
     * Default language for the relay session. This value is used for both text-to-speech and speech recognition unless `tts_language` or `transcription_language` are provided.
     */
    #[Optional]
    public ?string $language;

    /**
     * Language-specific TTS and transcription settings. Use this when the relay session needs per-language provider, voice, or speech model configuration.
     *
     * @var list<Language>|null $languages
     */
    #[Optional(list: Language::class)]
    public ?array $languages;

    /**
     * Participants to add to the conversation.
     *
     * @var list<Participant>|null $participants
     */
    #[Optional(list: Participant::class)]
    public ?array $participants;

    /**
     * When true, sends message history update webhooks.
     */
    #[Optional('send_message_history_updates')]
    public ?bool $sendMessageHistoryUpdates;

    /**
     * Speech-to-text settings for Conversation Relay.
     */
    #[Optional]
    public ?Transcription $transcription;

    /**
     * Language to use for speech recognition. Overrides `language` for transcription when provided.
     */
    #[Optional('transcription_language')]
    public ?string $transcriptionLanguage;

    /**
     * Language to use for text-to-speech. Overrides `language` for TTS when provided.
     */
    #[Optional('tts_language')]
    public ?string $ttsLanguage;

    /**
     * Time in milliseconds to wait for caller input before timing out.
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
     * - **Inworld:** Use `Inworld.<ModelId>.<VoiceId>` (e.g., `Inworld.Mini.Loretta`, `Inworld.Max.Oliver`). Supported models: `Mini`, `Max`.
     * - **xAI:** Use `xAI.<VoiceId>` (e.g., `xAI.eve`). Available voices: `eve`, `ara`, `rex`, `sal`, `leo`.
     */
    #[Optional]
    public ?string $voice;

    /**
     * The settings associated with the voice selected.
     *
     * @var VoiceSettingsVariants|null $voiceSettings
     */
    #[Optional('voice_settings', union: VoiceSettings::class)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|XaiVoiceSettings|null $voiceSettings;

    /**
     * `new ActionStartConversationRelayParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionStartConversationRelayParams::with(conversationRelayURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionStartConversationRelayParams)->withConversationRelayURL(...)
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
     * @param Assistant|AssistantShape|null $assistant
     * @param InterruptionSettings|InterruptionSettingsShape|null $interruptionSettings
     * @param list<Language|LanguageShape>|null $languages
     * @param list<Participant|ParticipantShape>|null $participants
     * @param Transcription|TranscriptionShape|null $transcription
     * @param VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        string $conversationRelayURL,
        Assistant|array|null $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $conversationRelayDtmfDetection = null,
        ?string $greeting = null,
        InterruptionSettings|array|null $interruptionSettings = null,
        ?string $language = null,
        ?array $languages = null,
        ?array $participants = null,
        ?bool $sendMessageHistoryUpdates = null,
        Transcription|array|null $transcription = null,
        ?string $transcriptionLanguage = null,
        ?string $ttsLanguage = null,
        ?int $userResponseTimeoutMs = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|XaiVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['conversationRelayURL'] = $conversationRelayURL;

        null !== $assistant && $self['assistant'] = $assistant;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $conversationRelayDtmfDetection && $self['conversationRelayDtmfDetection'] = $conversationRelayDtmfDetection;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $interruptionSettings && $self['interruptionSettings'] = $interruptionSettings;
        null !== $language && $self['language'] = $language;
        null !== $languages && $self['languages'] = $languages;
        null !== $participants && $self['participants'] = $participants;
        null !== $sendMessageHistoryUpdates && $self['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $transcriptionLanguage && $self['transcriptionLanguage'] = $transcriptionLanguage;
        null !== $ttsLanguage && $self['ttsLanguage'] = $ttsLanguage;
        null !== $userResponseTimeoutMs && $self['userResponseTimeoutMs'] = $userResponseTimeoutMs;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    public function withConversationRelayURL(string $conversationRelayURL): self
    {
        $self = clone $this;
        $self['conversationRelayURL'] = $conversationRelayURL;

        return $self;
    }

    /**
     * Custom parameters for the Conversation Relay session. Pass key-value data as `assistant.dynamic_variables` to make it available to the relay session.
     *
     * @param Assistant|AssistantShape $assistant
     */
    public function withAssistant(Assistant|array $assistant): self
    {
        $self = clone $this;
        $self['assistant'] = $assistant;

        return $self;
    }

    /**
     * Use this field to add state to subsequent webhooks. It must be a valid Base-64 encoded string.
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
     * Enable DTMF detection for the relay session.
     */
    public function withConversationRelayDtmfDetection(
        bool $conversationRelayDtmfDetection
    ): self {
        $self = clone $this;
        $self['conversationRelayDtmfDetection'] = $conversationRelayDtmfDetection;

        return $self;
    }

    /**
     * Text played when the relay session starts.
     */
    public function withGreeting(string $greeting): self
    {
        $self = clone $this;
        $self['greeting'] = $greeting;

        return $self;
    }

    /**
     * Settings for handling caller interruptions during Conversation Relay speech.
     *
     * @param InterruptionSettings|InterruptionSettingsShape $interruptionSettings
     */
    public function withInterruptionSettings(
        InterruptionSettings|array $interruptionSettings,
    ): self {
        $self = clone $this;
        $self['interruptionSettings'] = $interruptionSettings;

        return $self;
    }

    /**
     * Default language for the relay session. This value is used for both text-to-speech and speech recognition unless `tts_language` or `transcription_language` are provided.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Language-specific TTS and transcription settings. Use this when the relay session needs per-language provider, voice, or speech model configuration.
     *
     * @param list<Language|LanguageShape> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * Participants to add to the conversation.
     *
     * @param list<Participant|ParticipantShape> $participants
     */
    public function withParticipants(array $participants): self
    {
        $self = clone $this;
        $self['participants'] = $participants;

        return $self;
    }

    /**
     * When true, sends message history update webhooks.
     */
    public function withSendMessageHistoryUpdates(
        bool $sendMessageHistoryUpdates
    ): self {
        $self = clone $this;
        $self['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;

        return $self;
    }

    /**
     * Speech-to-text settings for Conversation Relay.
     *
     * @param Transcription|TranscriptionShape $transcription
     */
    public function withTranscription(Transcription|array $transcription): self
    {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * Language to use for speech recognition. Overrides `language` for transcription when provided.
     */
    public function withTranscriptionLanguage(
        string $transcriptionLanguage
    ): self {
        $self = clone $this;
        $self['transcriptionLanguage'] = $transcriptionLanguage;

        return $self;
    }

    /**
     * Language to use for text-to-speech. Overrides `language` for TTS when provided.
     */
    public function withTtsLanguage(string $ttsLanguage): self
    {
        $self = clone $this;
        $self['ttsLanguage'] = $ttsLanguage;

        return $self;
    }

    /**
     * Time in milliseconds to wait for caller input before timing out.
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
     * - **Inworld:** Use `Inworld.<ModelId>.<VoiceId>` (e.g., `Inworld.Mini.Loretta`, `Inworld.Max.Oliver`). Supported models: `Mini`, `Max`.
     * - **xAI:** Use `xAI.<VoiceId>` (e.g., `xAI.eve`). Available voices: `eve`, `ara`, `rex`, `sal`, `leo`.
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
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|XaiVoiceSettings $voiceSettings,
    ): self {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
