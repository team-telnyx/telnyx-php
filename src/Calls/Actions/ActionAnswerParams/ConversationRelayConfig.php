<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Interruptible;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\InterruptibleGreeting;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\VoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Calls\ConversationRelayInterruptionSettings;
use Telnyx\Calls\ConversationRelayLanguage;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InworldVoiceSettings;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\ResembleVoiceSettings;
use Telnyx\RimeVoiceSettings;
use Telnyx\XaiVoiceSettings;

/**
 * Starts a Conversation Relay session automatically when the answered/dialed call is answered. This embedded shape is supported on `answer` and `dial`. It uses public field names (`url`, `dtmf_detection`, `greeting`, `voice`, `language`, etc.) and maps them to the underlying Conversation Relay action. `client_state`, `tts_language`, and `transcription_language` inside this object are ignored; use the parent command's `client_state` and `command_id` fields instead.
 *
 * @phpstan-import-type VoiceSettingsVariants from \Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\VoiceSettings
 * @phpstan-import-type ConversationRelayInterruptionSettingsShape from \Telnyx\Calls\ConversationRelayInterruptionSettings
 * @phpstan-import-type ConversationRelayLanguageShape from \Telnyx\Calls\ConversationRelayLanguage
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\VoiceSettings
 *
 * @phpstan-type ConversationRelayConfigShape = array{
 *   url: string,
 *   customParameters?: array<string,mixed>|null,
 *   dtmfDetection?: bool|null,
 *   greeting?: string|null,
 *   interruptible?: null|Interruptible|value-of<Interruptible>,
 *   interruptibleGreeting?: null|InterruptibleGreeting|value-of<InterruptibleGreeting>,
 *   interruptionSettings?: null|ConversationRelayInterruptionSettings|ConversationRelayInterruptionSettingsShape,
 *   language?: string|null,
 *   languages?: list<ConversationRelayLanguage|ConversationRelayLanguageShape>|null,
 *   provider?: string|null,
 *   structuredProvider?: array<string,mixed>|null,
 *   transcriptionEngine?: null|TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionEngineConfig?: array<string,mixed>|null,
 *   ttsProvider?: string|null,
 *   voice?: string|null,
 *   voiceSettings?: VoiceSettingsShape|null,
 * }
 */
final class ConversationRelayConfig implements BaseModel
{
    /** @use SdkModel<ConversationRelayConfigShape> */
    use SdkModel;

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    #[Required]
    public string $url;

    /**
     * Custom key-value parameters forwarded to the relay session as assistant dynamic variables.
     *
     * @var array<string,mixed>|null $customParameters
     */
    #[Optional('custom_parameters', map: 'mixed')]
    public ?array $customParameters;

    /**
     * Enable DTMF detection for the relay session.
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
     * @var value-of<Interruptible>|null $interruptible
     */
    #[Optional(enum: Interruptible::class)]
    public ?string $interruptible;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<InterruptibleGreeting>|null $interruptibleGreeting
     */
    #[Optional('interruptible_greeting', enum: InterruptibleGreeting::class)]
    public ?string $interruptibleGreeting;

    /**
     * Settings for handling caller interruptions during Conversation Relay speech.
     */
    #[Optional('interruption_settings')]
    public ?ConversationRelayInterruptionSettings $interruptionSettings;

    /**
     * Default language for both text-to-speech and speech recognition.
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

    /**
     * `new ConversationRelayConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationRelayConfig::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationRelayConfig)->withURL(...)
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
     * @param array<string,mixed>|null $customParameters
     * @param Interruptible|value-of<Interruptible>|null $interruptible
     * @param InterruptibleGreeting|value-of<InterruptibleGreeting>|null $interruptibleGreeting
     * @param ConversationRelayInterruptionSettings|ConversationRelayInterruptionSettingsShape|null $interruptionSettings
     * @param list<ConversationRelayLanguage|ConversationRelayLanguageShape>|null $languages
     * @param array<string,mixed>|null $structuredProvider
     * @param TranscriptionEngine|value-of<TranscriptionEngine>|null $transcriptionEngine
     * @param array<string,mixed>|null $transcriptionEngineConfig
     * @param VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        string $url,
        ?array $customParameters = null,
        ?bool $dtmfDetection = null,
        ?string $greeting = null,
        Interruptible|string|null $interruptible = null,
        InterruptibleGreeting|string|null $interruptibleGreeting = null,
        ConversationRelayInterruptionSettings|array|null $interruptionSettings = null,
        ?string $language = null,
        ?array $languages = null,
        ?string $provider = null,
        ?array $structuredProvider = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        ?array $transcriptionEngineConfig = null,
        ?string $ttsProvider = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['url'] = $url;

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
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionEngineConfig && $self['transcriptionEngineConfig'] = $transcriptionEngineConfig;
        null !== $ttsProvider && $self['ttsProvider'] = $ttsProvider;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Custom key-value parameters forwarded to the relay session as assistant dynamic variables.
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
     * Enable DTMF detection for the relay session.
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
     * @param Interruptible|value-of<Interruptible> $interruptible
     */
    public function withInterruptible(Interruptible|string $interruptible): self
    {
        $self = clone $this;
        $self['interruptible'] = $interruptible;

        return $self;
    }

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param InterruptibleGreeting|value-of<InterruptibleGreeting> $interruptibleGreeting
     */
    public function withInterruptibleGreeting(
        InterruptibleGreeting|string $interruptibleGreeting
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
     * Default language for both text-to-speech and speech recognition.
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
