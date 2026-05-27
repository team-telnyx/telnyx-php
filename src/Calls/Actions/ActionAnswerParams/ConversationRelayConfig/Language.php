<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig;

use Telnyx\AzureVoiceSettings;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\VoiceSettings;
use Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\VoiceSettings\InworldVoiceSettings;
use Telnyx\Calls\Actions\AwsVoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings;
use Telnyx\Calls\Actions\TelnyxVoiceSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MinimaxVoiceSettings;
use Telnyx\ResembleVoiceSettings;
use Telnyx\RimeVoiceSettings;
use Telnyx\XaiVoiceSettings;

/**
 * Language-specific TTS and transcription settings for Conversation Relay.
 *
 * @phpstan-import-type VoiceSettingsVariants from \Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\VoiceSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\VoiceSettings
 *
 * @phpstan-type LanguageShape = array{
 *   language: string,
 *   speechModel?: string|null,
 *   transcriptionEngine?: null|\Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\TranscriptionEngine|value-of<\Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language\TranscriptionEngine>,
 *   transcriptionEngineConfig?: array<string,mixed>|null,
 *   transcriptionProvider?: string|null,
 *   ttsProvider?: string|null,
 *   voice?: string|null,
 *   voiceSettings?: VoiceSettingsShape|null,
 * }
 */
final class Language implements BaseModel
{
    /** @use SdkModel<LanguageShape> */
    use SdkModel;

    /**
     * BCP 47 language tag for this language configuration.
     */
    #[Required]
    public string $language;

    /**
     * Conversation Relay speech model. Prefer `transcription_engine_config.transcription_model` when configuring speech-to-text.
     */
    #[Optional('speech_model')]
    public ?string $speechModel;

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility. When provided in a Conversation Relay language entry, Telnyx derives `transcription_provider` and `speech_model` for that language.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Optional(
        'transcription_engine',
        enum: TranscriptionEngine::class,
    )]
    public ?string $transcriptionEngine;

    /**
     * Engine-specific transcription settings for Conversation Relay. This accepts the same provider-specific options used by the Call Transcription Start command, such as `transcription_model`, without requiring the engine discriminator to be repeated inside this object.
     *
     * @var array<string,mixed>|null $transcriptionEngineConfig
     */
    #[Optional('transcription_engine_config', map: 'mixed')]
    public ?array $transcriptionEngineConfig;

    /**
     * Conversation Relay transcription provider name. Prefer `transcription_engine` when configuring speech-to-text.
     */
    #[Optional('transcription_provider')]
    public ?string $transcriptionProvider;

    /**
     * Text-to-speech provider for this language. If omitted and `voice` is provided, Telnyx derives the provider from the voice identifier.
     */
    #[Optional('tts_provider')]
    public ?string $ttsProvider;

    /**
     * Voice identifier for this language.
     */
    #[Optional]
    public ?string $voice;

    /**
     * The settings associated with the voice selected.
     *
     * @var VoiceSettingsVariants|null $voiceSettings
     */
    #[Optional(
        'voice_settings',
        union: VoiceSettings::class,
    )]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings|null $voiceSettings;

    /**
     * `new Language()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Language::with(language: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Language)->withLanguage(...)
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
     * @param TranscriptionEngine|value-of<TranscriptionEngine>|null $transcriptionEngine
     * @param array<string,mixed>|null $transcriptionEngineConfig
     * @param VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        string $language,
        ?string $speechModel = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        ?array $transcriptionEngineConfig = null,
        ?string $transcriptionProvider = null,
        ?string $ttsProvider = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|MinimaxVoiceSettings|AzureVoiceSettings|RimeVoiceSettings|ResembleVoiceSettings|InworldVoiceSettings|XaiVoiceSettings|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['language'] = $language;

        null !== $speechModel && $self['speechModel'] = $speechModel;
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionEngineConfig && $self['transcriptionEngineConfig'] = $transcriptionEngineConfig;
        null !== $transcriptionProvider && $self['transcriptionProvider'] = $transcriptionProvider;
        null !== $ttsProvider && $self['ttsProvider'] = $ttsProvider;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * BCP 47 language tag for this language configuration.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Conversation Relay speech model. Prefer `transcription_engine_config.transcription_model` when configuring speech-to-text.
     */
    public function withSpeechModel(string $speechModel): self
    {
        $self = clone $this;
        $self['speechModel'] = $speechModel;

        return $self;
    }

    /**
     * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility. When provided in a Conversation Relay language entry, Telnyx derives `transcription_provider` and `speech_model` for that language.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine,
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
     * Conversation Relay transcription provider name. Prefer `transcription_engine` when configuring speech-to-text.
     */
    public function withTranscriptionProvider(
        string $transcriptionProvider
    ): self {
        $self = clone $this;
        $self['transcriptionProvider'] = $transcriptionProvider;

        return $self;
    }

    /**
     * Text-to-speech provider for this language. If omitted and `voice` is provided, Telnyx derives the provider from the voice identifier.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $self = clone $this;
        $self['ttsProvider'] = $ttsProvider;

        return $self;
    }

    /**
     * Voice identifier for this language.
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
