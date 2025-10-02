<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google\Model;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google\SpeechContext;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Google\TranscriptionEngine;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type google_alias = array{
 *   enableSpeakerDiarization?: bool,
 *   hints?: list<string>,
 *   interimResults?: bool,
 *   language?: value-of<GoogleTranscriptionLanguage>,
 *   maxSpeakerCount?: int,
 *   minSpeakerCount?: int,
 *   model?: value-of<Model>,
 *   profanityFilter?: bool,
 *   speechContext?: list<SpeechContext>,
 *   transcriptionEngine?: value-of<TranscriptionEngine>,
 *   useEnhanced?: bool,
 * }
 */
final class Google implements BaseModel
{
    /** @use SdkModel<google_alias> */
    use SdkModel;

    /**
     * Enables speaker diarization.
     */
    #[Api('enable_speaker_diarization', optional: true)]
    public ?bool $enableSpeakerDiarization;

    /**
     * Hints to improve transcription accuracy.
     *
     * @var list<string>|null $hints
     */
    #[Api(list: 'string', optional: true)]
    public ?array $hints;

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    #[Api('interim_results', optional: true)]
    public ?bool $interimResults;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<GoogleTranscriptionLanguage>|null $language
     */
    #[Api(enum: GoogleTranscriptionLanguage::class, optional: true)]
    public ?string $language;

    /**
     * Defines maximum number of speakers in the conversation.
     */
    #[Api('max_speaker_count', optional: true)]
    public ?int $maxSpeakerCount;

    /**
     * Defines minimum number of speakers in the conversation.
     */
    #[Api('min_speaker_count', optional: true)]
    public ?int $minSpeakerCount;

    /**
     * The model to use for transcription.
     *
     * @var value-of<Model>|null $model
     */
    #[Api(enum: Model::class, optional: true)]
    public ?string $model;

    /**
     * Enables profanity_filter.
     */
    #[Api('profanity_filter', optional: true)]
    public ?bool $profanityFilter;

    /**
     * Speech context to improve transcription accuracy.
     *
     * @var list<SpeechContext>|null $speechContext
     */
    #[Api('speech_context', list: SpeechContext::class, optional: true)]
    public ?array $speechContext;

    /**
     * Engine identifier for Google transcription service.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Api(
        'transcription_engine',
        enum: TranscriptionEngine::class,
        optional: true
    )]
    public ?string $transcriptionEngine;

    /**
     * Enables enhanced transcription, this works for models `phone_call` and `video`.
     */
    #[Api('use_enhanced', optional: true)]
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
     * @param list<SpeechContext> $speechContext
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
        $obj = new self;

        null !== $enableSpeakerDiarization && $obj->enableSpeakerDiarization = $enableSpeakerDiarization;
        null !== $hints && $obj->hints = $hints;
        null !== $interimResults && $obj->interimResults = $interimResults;
        null !== $language && $obj->language = $language instanceof GoogleTranscriptionLanguage ? $language->value : $language;
        null !== $maxSpeakerCount && $obj->maxSpeakerCount = $maxSpeakerCount;
        null !== $minSpeakerCount && $obj->minSpeakerCount = $minSpeakerCount;
        null !== $model && $obj->model = $model instanceof Model ? $model->value : $model;
        null !== $profanityFilter && $obj->profanityFilter = $profanityFilter;
        null !== $speechContext && $obj->speechContext = $speechContext;
        null !== $transcriptionEngine && $obj->transcriptionEngine = $transcriptionEngine instanceof TranscriptionEngine ? $transcriptionEngine->value : $transcriptionEngine;
        null !== $useEnhanced && $obj->useEnhanced = $useEnhanced;

        return $obj;
    }

    /**
     * Enables speaker diarization.
     */
    public function withEnableSpeakerDiarization(
        bool $enableSpeakerDiarization
    ): self {
        $obj = clone $this;
        $obj->enableSpeakerDiarization = $enableSpeakerDiarization;

        return $obj;
    }

    /**
     * Hints to improve transcription accuracy.
     *
     * @param list<string> $hints
     */
    public function withHints(array $hints): self
    {
        $obj = clone $this;
        $obj->hints = $hints;

        return $obj;
    }

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    public function withInterimResults(bool $interimResults): self
    {
        $obj = clone $this;
        $obj->interimResults = $interimResults;

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
        $obj->language = $language instanceof GoogleTranscriptionLanguage ? $language->value : $language;

        return $obj;
    }

    /**
     * Defines maximum number of speakers in the conversation.
     */
    public function withMaxSpeakerCount(int $maxSpeakerCount): self
    {
        $obj = clone $this;
        $obj->maxSpeakerCount = $maxSpeakerCount;

        return $obj;
    }

    /**
     * Defines minimum number of speakers in the conversation.
     */
    public function withMinSpeakerCount(int $minSpeakerCount): self
    {
        $obj = clone $this;
        $obj->minSpeakerCount = $minSpeakerCount;

        return $obj;
    }

    /**
     * The model to use for transcription.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $obj = clone $this;
        $obj->model = $model instanceof Model ? $model->value : $model;

        return $obj;
    }

    /**
     * Enables profanity_filter.
     */
    public function withProfanityFilter(bool $profanityFilter): self
    {
        $obj = clone $this;
        $obj->profanityFilter = $profanityFilter;

        return $obj;
    }

    /**
     * Speech context to improve transcription accuracy.
     *
     * @param list<SpeechContext> $speechContext
     */
    public function withSpeechContext(array $speechContext): self
    {
        $obj = clone $this;
        $obj->speechContext = $speechContext;

        return $obj;
    }

    /**
     * Engine identifier for Google transcription service.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $obj = clone $this;
        $obj->transcriptionEngine = $transcriptionEngine instanceof TranscriptionEngine ? $transcriptionEngine->value : $transcriptionEngine;

        return $obj;
    }

    /**
     * Enables enhanced transcription, this works for models `phone_call` and `video`.
     */
    public function withUseEnhanced(bool $useEnhanced): self
    {
        $obj = clone $this;
        $obj->useEnhanced = $useEnhanced;

        return $obj;
    }
}
