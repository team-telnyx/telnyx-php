<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineAConfig\Model;
use Telnyx\Calls\Actions\TranscriptionEngineAConfig\SpeechContext;
use Telnyx\Calls\Actions\TranscriptionEngineAConfig\TranscriptionEngine;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SpeechContextShape from \Telnyx\Calls\Actions\TranscriptionEngineAConfig\SpeechContext
 *
 * @phpstan-type TranscriptionEngineAConfigShape = array{
 *   enableSpeakerDiarization?: bool|null,
 *   hints?: list<string>|null,
 *   interimResults?: bool|null,
 *   language?: null|GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage>,
 *   maxSpeakerCount?: int|null,
 *   minSpeakerCount?: int|null,
 *   model?: null|Model|value-of<Model>,
 *   profanityFilter?: bool|null,
 *   speechContext?: list<SpeechContextShape>|null,
 *   transcriptionEngine?: null|TranscriptionEngine|value-of<TranscriptionEngine>,
 *   useEnhanced?: bool|null,
 * }
 */
final class TranscriptionEngineAConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionEngineAConfigShape> */
    use SdkModel;

    /**
     * Enables speaker diarization.
     */
    #[Optional('enable_speaker_diarization')]
    public ?bool $enableSpeakerDiarization;

    /**
     * Hints to improve transcription accuracy.
     *
     * @var list<string>|null $hints
     */
    #[Optional(list: 'string')]
    public ?array $hints;

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    #[Optional('interim_results')]
    public ?bool $interimResults;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<GoogleTranscriptionLanguage>|null $language
     */
    #[Optional(enum: GoogleTranscriptionLanguage::class)]
    public ?string $language;

    /**
     * Defines maximum number of speakers in the conversation.
     */
    #[Optional('max_speaker_count')]
    public ?int $maxSpeakerCount;

    /**
     * Defines minimum number of speakers in the conversation.
     */
    #[Optional('min_speaker_count')]
    public ?int $minSpeakerCount;

    /**
     * The model to use for transcription.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

    /**
     * Enables profanity_filter.
     */
    #[Optional('profanity_filter')]
    public ?bool $profanityFilter;

    /**
     * Speech context to improve transcription accuracy.
     *
     * @var list<SpeechContext>|null $speechContext
     */
    #[Optional('speech_context', list: SpeechContext::class)]
    public ?array $speechContext;

    /**
     * Engine identifier for Google transcription service.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Optional('transcription_engine', enum: TranscriptionEngine::class)]
    public ?string $transcriptionEngine;

    /**
     * Enables enhanced transcription, this works for models `phone_call` and `video`.
     */
    #[Optional('use_enhanced')]
    public ?bool $useEnhanced;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $hints
     * @param GoogleTranscriptionLanguage|value-of<GoogleTranscriptionLanguage> $language
     * @param Model|value-of<Model> $model
     * @param list<SpeechContextShape> $speechContext
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public static function with(
        ?bool $enableSpeakerDiarization = null,
        ?array $hints = null,
        ?bool $interimResults = null,
        GoogleTranscriptionLanguage|string|null $language = null,
        ?int $maxSpeakerCount = null,
        ?int $minSpeakerCount = null,
        Model|string|null $model = null,
        ?bool $profanityFilter = null,
        ?array $speechContext = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        ?bool $useEnhanced = null,
    ): self {
        $self = new self;

        null !== $enableSpeakerDiarization && $self['enableSpeakerDiarization'] = $enableSpeakerDiarization;
        null !== $hints && $self['hints'] = $hints;
        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $language && $self['language'] = $language;
        null !== $maxSpeakerCount && $self['maxSpeakerCount'] = $maxSpeakerCount;
        null !== $minSpeakerCount && $self['minSpeakerCount'] = $minSpeakerCount;
        null !== $model && $self['model'] = $model;
        null !== $profanityFilter && $self['profanityFilter'] = $profanityFilter;
        null !== $speechContext && $self['speechContext'] = $speechContext;
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $useEnhanced && $self['useEnhanced'] = $useEnhanced;

        return $self;
    }

    /**
     * Enables speaker diarization.
     */
    public function withEnableSpeakerDiarization(
        bool $enableSpeakerDiarization
    ): self {
        $self = clone $this;
        $self['enableSpeakerDiarization'] = $enableSpeakerDiarization;

        return $self;
    }

    /**
     * Hints to improve transcription accuracy.
     *
     * @param list<string> $hints
     */
    public function withHints(array $hints): self
    {
        $self = clone $this;
        $self['hints'] = $hints;

        return $self;
    }

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    public function withInterimResults(bool $interimResults): self
    {
        $self = clone $this;
        $self['interimResults'] = $interimResults;

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
     * Defines maximum number of speakers in the conversation.
     */
    public function withMaxSpeakerCount(int $maxSpeakerCount): self
    {
        $self = clone $this;
        $self['maxSpeakerCount'] = $maxSpeakerCount;

        return $self;
    }

    /**
     * Defines minimum number of speakers in the conversation.
     */
    public function withMinSpeakerCount(int $minSpeakerCount): self
    {
        $self = clone $this;
        $self['minSpeakerCount'] = $minSpeakerCount;

        return $self;
    }

    /**
     * The model to use for transcription.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Enables profanity_filter.
     */
    public function withProfanityFilter(bool $profanityFilter): self
    {
        $self = clone $this;
        $self['profanityFilter'] = $profanityFilter;

        return $self;
    }

    /**
     * Speech context to improve transcription accuracy.
     *
     * @param list<SpeechContextShape> $speechContext
     */
    public function withSpeechContext(array $speechContext): self
    {
        $self = clone $this;
        $self['speechContext'] = $speechContext;

        return $self;
    }

    /**
     * Engine identifier for Google transcription service.
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
     * Enables enhanced transcription, this works for models `phone_call` and `video`.
     */
    public function withUseEnhanced(bool $useEnhanced): self
    {
        $self = clone $this;
        $self['useEnhanced'] = $useEnhanced;

        return $self;
    }
}
