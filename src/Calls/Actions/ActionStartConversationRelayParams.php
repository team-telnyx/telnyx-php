<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\Assistant;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\ConversationRelaySettings;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings;
use Telnyx\Calls\ConversationRelayInterruptionSettings;
use Telnyx\Calls\ConversationRelayLanguage;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InworldVoiceSettings;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\ResembleVoiceSettings;
use Telnyx\RimeVoiceSettings;
use Telnyx\XaiVoiceSettings;

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
 * @phpstan-import-type ConversationRelaySettingsShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\ConversationRelaySettings
 * @phpstan-import-type ConversationRelayInterruptionSettingsShape from \Telnyx\Calls\ConversationRelayInterruptionSettings
 * @phpstan-import-type ConversationRelayLanguageShape from \Telnyx\Calls\ConversationRelayLanguage
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionStartConversationRelayParams\VoiceSettings
 *
 * @phpstan-type ActionStartConversationRelayParamsShape = array{
 *   assistant?: null|Assistant|AssistantShape,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   conversationRelayDtmfDetection?: bool|null,
 *   conversationRelaySettings?: null|ConversationRelaySettings|ConversationRelaySettingsShape,
 *   conversationRelayURL?: string|null,
 *   customParameters?: array<string,mixed>|null,
 *   dtmfDetection?: bool|null,
 *   greeting?: string|null,
 *   interruptible?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 *   interruptibleGreeting?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 *   interruptionSettings?: null|ConversationRelayInterruptionSettings|ConversationRelayInterruptionSettingsShape,
 *   language?: string|null,
 *   languages?: list<ConversationRelayLanguage|ConversationRelayLanguageShape>|null,
 *   provider?: string|null,
 *   structuredProvider?: array<string,mixed>|null,
 *   transcription?: array<string,mixed>|null,
 *   transcriptionEngine?: null|TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionEngineConfig?: array<string,mixed>|null,
 *   ttsProvider?: string|null,
 *   url?: string|null,
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
     * Conversation Relay connection settings. This object can provide `url`, `dtmf_detection`, `interruptible`, `interruptible_greeting`, and `languages`. Top-level aliases override nested values when both are present.
     */
    #[Optional('conversation_relay_settings')]
    public ?ConversationRelaySettings $conversationRelaySettings;

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    #[Optional('conversation_relay_url')]
    public ?string $conversationRelayURL;

    /**
     * Custom key-value parameters forwarded to the relay session as `assistant.dynamic_variables`. If `assistant.dynamic_variables` is also present, these values are merged in.
     *
     * @var array<string,mixed>|null $customParameters
     */
    #[Optional('custom_parameters', map: 'mixed')]
    public ?array $customParameters;

    /**
     * Public alias for `conversation_relay_dtmf_detection`. If both are present, this value wins.
     */
    #[Optional('dtmf_detection')]
    public ?bool $dtmfDetection;

    /**
     * Text played when the relay session starts.
     */
    #[Optional]
    public ?string $greeting;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<ConversationRelayInterruptible>|null $interruptible
     */
    #[Optional(enum: ConversationRelayInterruptible::class)]
    public ?string $interruptible;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<ConversationRelayInterruptible>|null $interruptibleGreeting
     */
    #[Optional(
        'interruptible_greeting',
        enum: ConversationRelayInterruptible::class
    )]
    public ?string $interruptibleGreeting;

    /**
     * Settings for handling caller interruptions during Conversation Relay speech.
     */
    #[Optional('interruption_settings')]
    public ?ConversationRelayInterruptionSettings $interruptionSettings;

    /**
     * Default language for the relay session. This value is used for both text-to-speech and speech recognition.
     */
    #[Optional]
    public ?string $language;

    /**
     * Per-language TTS and transcription settings.
     *
     * @var list<ConversationRelayLanguage>|null $languages
     */
    #[Optional(list: ConversationRelayLanguage::class)]
    public ?array $languages;

    /**
     * Structured voice provider. Must be supplied together with `structured_provider`.
     */
    #[Optional]
    public ?string $provider;

    /**
     * Provider-specific structured voice settings. Must be supplied together with `provider`; Telnyx sends the value as the nested provider configuration for Conversation Relay.
     *
     * @var array<string,mixed>|null $structuredProvider
     */
    #[Optional('structured_provider', map: 'mixed')]
    public ?array $structuredProvider;

    /**
     * @deprecated
     *
     * Not supported for Conversation Relay start requests. Use `transcription_engine` and `transcription_engine_config` instead.
     *
     * @var array<string,mixed>|null $transcription
     */
    #[Optional(map: 'mixed')]
    public ?array $transcription;

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility. For Conversation Relay, use this field with `transcription_engine_config`; the `transcription` object is not supported.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Optional('transcription_engine', enum: TranscriptionEngine::class)]
    public ?string $transcriptionEngine;

    /**
     * Engine-specific transcription settings for Conversation Relay. This accepts the same provider-specific options used by the Call Transcription Start command, such as `transcription_model`, without requiring the engine discriminator to be repeated inside this object.
     *
     * @var array<string,mixed>|null $transcriptionEngineConfig
     */
    #[Optional('transcription_engine_config', map: 'mixed')]
    public ?array $transcriptionEngineConfig;

    /**
     * Text-to-speech provider. If omitted, Telnyx derives it from `voice` or `provider`.
     */
    #[Optional('tts_provider')]
    public ?string $ttsProvider;

    /**
     * Public alias for `conversation_relay_url`. Must start with `ws://` or `wss://`. If both are present, this value wins.
     */
    #[Optional]
    public ?string $url;

    /**
     * The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     * - **Inworld:** Use `Inworld.<ModelId>.<VoiceId>` (e.g., `Inworld.Mini.Loretta`, `Inworld.Max.Oliver`, `Inworld.TTS2.Loretta`). Supported models: `Mini`, `Max`, `TTS2`.
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
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings|null $voiceSettings;

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
     * @param ConversationRelaySettings|ConversationRelaySettingsShape|null $conversationRelaySettings
     * @param array<string,mixed>|null $customParameters
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>|null $interruptible
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>|null $interruptibleGreeting
     * @param ConversationRelayInterruptionSettings|ConversationRelayInterruptionSettingsShape|null $interruptionSettings
     * @param list<ConversationRelayLanguage|ConversationRelayLanguageShape>|null $languages
     * @param array<string,mixed>|null $structuredProvider
     * @param array<string,mixed>|null $transcription
     * @param TranscriptionEngine|value-of<TranscriptionEngine>|null $transcriptionEngine
     * @param array<string,mixed>|null $transcriptionEngineConfig
     * @param VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        Assistant|array|null $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $conversationRelayDtmfDetection = null,
        ConversationRelaySettings|array|null $conversationRelaySettings = null,
        ?string $conversationRelayURL = null,
        ?array $customParameters = null,
        ?bool $dtmfDetection = null,
        ?string $greeting = null,
        ConversationRelayInterruptible|string|null $interruptible = null,
        ConversationRelayInterruptible|string|null $interruptibleGreeting = null,
        ConversationRelayInterruptionSettings|array|null $interruptionSettings = null,
        ?string $language = null,
        ?array $languages = null,
        ?string $provider = null,
        ?array $structuredProvider = null,
        ?array $transcription = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        ?array $transcriptionEngineConfig = null,
        ?string $ttsProvider = null,
        ?string $url = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        null !== $assistant && $self['assistant'] = $assistant;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $conversationRelayDtmfDetection && $self['conversationRelayDtmfDetection'] = $conversationRelayDtmfDetection;
        null !== $conversationRelaySettings && $self['conversationRelaySettings'] = $conversationRelaySettings;
        null !== $conversationRelayURL && $self['conversationRelayURL'] = $conversationRelayURL;
        null !== $customParameters && $self['customParameters'] = $customParameters;
        null !== $dtmfDetection && $self['dtmfDetection'] = $dtmfDetection;
        null !== $greeting && $self['greeting'] = $greeting;
        null !== $interruptible && $self['interruptible'] = $interruptible;
        null !== $interruptibleGreeting && $self['interruptibleGreeting'] = $interruptibleGreeting;
        null !== $interruptionSettings && $self['interruptionSettings'] = $interruptionSettings;
        null !== $language && $self['language'] = $language;
        null !== $languages && $self['languages'] = $languages;
        null !== $provider && $self['provider'] = $provider;
        null !== $structuredProvider && $self['structuredProvider'] = $structuredProvider;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionEngineConfig && $self['transcriptionEngineConfig'] = $transcriptionEngineConfig;
        null !== $ttsProvider && $self['ttsProvider'] = $ttsProvider;
        null !== $url && $self['url'] = $url;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

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
     * Conversation Relay connection settings. This object can provide `url`, `dtmf_detection`, `interruptible`, `interruptible_greeting`, and `languages`. Top-level aliases override nested values when both are present.
     *
     * @param ConversationRelaySettings|ConversationRelaySettingsShape $conversationRelaySettings
     */
    public function withConversationRelaySettings(
        ConversationRelaySettings|array $conversationRelaySettings
    ): self {
        $self = clone $this;
        $self['conversationRelaySettings'] = $conversationRelaySettings;

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
     * Custom key-value parameters forwarded to the relay session as `assistant.dynamic_variables`. If `assistant.dynamic_variables` is also present, these values are merged in.
     *
     * @param array<string,mixed> $customParameters
     */
    public function withCustomParameters(array $customParameters): self
    {
        $self = clone $this;
        $self['customParameters'] = $customParameters;

        return $self;
    }

    /**
     * Public alias for `conversation_relay_dtmf_detection`. If both are present, this value wins.
     */
    public function withDtmfDetection(bool $dtmfDetection): self
    {
        $self = clone $this;
        $self['dtmfDetection'] = $dtmfDetection;

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
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible> $interruptible
     */
    public function withInterruptible(
        ConversationRelayInterruptible|string $interruptible
    ): self {
        $self = clone $this;
        $self['interruptible'] = $interruptible;

        return $self;
    }

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible> $interruptibleGreeting
     */
    public function withInterruptibleGreeting(
        ConversationRelayInterruptible|string $interruptibleGreeting
    ): self {
        $self = clone $this;
        $self['interruptibleGreeting'] = $interruptibleGreeting;

        return $self;
    }

    /**
     * Settings for handling caller interruptions during Conversation Relay speech.
     *
     * @param ConversationRelayInterruptionSettings|ConversationRelayInterruptionSettingsShape $interruptionSettings
     */
    public function withInterruptionSettings(
        ConversationRelayInterruptionSettings|array $interruptionSettings
    ): self {
        $self = clone $this;
        $self['interruptionSettings'] = $interruptionSettings;

        return $self;
    }

    /**
     * Default language for the relay session. This value is used for both text-to-speech and speech recognition.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Per-language TTS and transcription settings.
     *
     * @param list<ConversationRelayLanguage|ConversationRelayLanguageShape> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * Structured voice provider. Must be supplied together with `structured_provider`.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Provider-specific structured voice settings. Must be supplied together with `provider`; Telnyx sends the value as the nested provider configuration for Conversation Relay.
     *
     * @param array<string,mixed> $structuredProvider
     */
    public function withStructuredProvider(array $structuredProvider): self
    {
        $self = clone $this;
        $self['structuredProvider'] = $structuredProvider;

        return $self;
    }

    /**
     * Not supported for Conversation Relay start requests. Use `transcription_engine` and `transcription_engine_config` instead.
     *
     * @param array<string,mixed> $transcription
     */
    public function withTranscription(array $transcription): self
    {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility. For Conversation Relay, use this field with `transcription_engine_config`; the `transcription` object is not supported.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $self = clone $this;
        $self['transcriptionEngine'] = $transcriptionEngine;

        return $self;
    }

    /**
     * Engine-specific transcription settings for Conversation Relay. This accepts the same provider-specific options used by the Call Transcription Start command, such as `transcription_model`, without requiring the engine discriminator to be repeated inside this object.
     *
     * @param array<string,mixed> $transcriptionEngineConfig
     */
    public function withTranscriptionEngineConfig(
        array $transcriptionEngineConfig
    ): self {
        $self = clone $this;
        $self['transcriptionEngineConfig'] = $transcriptionEngineConfig;

        return $self;
    }

    /**
     * Text-to-speech provider. If omitted, Telnyx derives it from `voice` or `provider`.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $self = clone $this;
        $self['ttsProvider'] = $ttsProvider;

        return $self;
    }

    /**
     * Public alias for `conversation_relay_url`. Must start with `ws://` or `wss://`. If both are present, this value wins.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

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
     * - **Inworld:** Use `Inworld.<ModelId>.<VoiceId>` (e.g., `Inworld.Mini.Loretta`, `Inworld.Max.Oliver`, `Inworld.TTS2.Loretta`). Supported models: `Mini`, `Max`, `TTS2`.
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
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings $voiceSettings,
    ): self {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
