<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Google\Model;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Google\SpeechContext;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\Google\TranscriptionEngine;
use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type GoogleShape = array{
 *   enable_speaker_diarization?: bool|null,
 *   hints?: list<string>|null,
 *   interim_results?: bool|null,
 *   language?: value-of<GoogleTranscriptionLanguage>|null,
 *   max_speaker_count?: int|null,
 *   min_speaker_count?: int|null,
 *   model?: value-of<Model>|null,
 *   profanity_filter?: bool|null,
 *   speech_context?: list<SpeechContext>|null,
 *   transcription_engine?: value-of<TranscriptionEngine>|null,
 *   use_enhanced?: bool|null,
 * }
 */
final class Google implements BaseModel
{
    /** @use SdkModel<GoogleShape> */
    use SdkModel;

    /**
     * Enables speaker diarization.
     */
    #[Api(optional: true)]
    public ?bool $enable_speaker_diarization;

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
    #[Api(optional: true)]
    public ?bool $interim_results;

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
    #[Api(optional: true)]
    public ?int $max_speaker_count;

    /**
     * Defines minimum number of speakers in the conversation.
     */
    #[Api(optional: true)]
    public ?int $min_speaker_count;

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
    #[Api(optional: true)]
    public ?bool $profanity_filter;

    /**
     * Speech context to improve transcription accuracy.
     *
     * @var list<SpeechContext>|null $speech_context
     */
    #[Api(list: SpeechContext::class, optional: true)]
    public ?array $speech_context;

    /**
     * Engine identifier for Google transcription service.
     *
     * @var value-of<TranscriptionEngine>|null $transcription_engine
     */
    #[Api(enum: TranscriptionEngine::class, optional: true)]
    public ?string $transcription_engine;

    /**
     * Enables enhanced transcription, this works for models `phone_call` and `video`.
     */
    #[Api(optional: true)]
    public ?bool $use_enhanced;

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
     * @param list<SpeechContext> $speech_context
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcription_engine
     */
    public static function with(
        ?bool $enable_speaker_diarization = null,
        ?array $hints = null,
        ?bool $interim_results = null,
        GoogleTranscriptionLanguage|string|null $language = null,
        ?int $max_speaker_count = null,
        ?int $min_speaker_count = null,
        Model|string|null $model = null,
        ?bool $profanity_filter = null,
        ?array $speech_context = null,
        TranscriptionEngine|string|null $transcription_engine = null,
        ?bool $use_enhanced = null,
    ): self {
        $obj = new self;

        null !== $enable_speaker_diarization && $obj->enable_speaker_diarization = $enable_speaker_diarization;
        null !== $hints && $obj->hints = $hints;
        null !== $interim_results && $obj->interim_results = $interim_results;
        null !== $language && $obj['language'] = $language;
        null !== $max_speaker_count && $obj->max_speaker_count = $max_speaker_count;
        null !== $min_speaker_count && $obj->min_speaker_count = $min_speaker_count;
        null !== $model && $obj['model'] = $model;
        null !== $profanity_filter && $obj->profanity_filter = $profanity_filter;
        null !== $speech_context && $obj->speech_context = $speech_context;
        null !== $transcription_engine && $obj['transcription_engine'] = $transcription_engine;
        null !== $use_enhanced && $obj->use_enhanced = $use_enhanced;

        return $obj;
    }

    /**
     * Enables speaker diarization.
     */
    public function withEnableSpeakerDiarization(
        bool $enableSpeakerDiarization
    ): self {
        $obj = clone $this;
        $obj->enable_speaker_diarization = $enableSpeakerDiarization;

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
        $obj->interim_results = $interimResults;

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
     * Defines maximum number of speakers in the conversation.
     */
    public function withMaxSpeakerCount(int $maxSpeakerCount): self
    {
        $obj = clone $this;
        $obj->max_speaker_count = $maxSpeakerCount;

        return $obj;
    }

    /**
     * Defines minimum number of speakers in the conversation.
     */
    public function withMinSpeakerCount(int $minSpeakerCount): self
    {
        $obj = clone $this;
        $obj->min_speaker_count = $minSpeakerCount;

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
        $obj['model'] = $model;

        return $obj;
    }

    /**
     * Enables profanity_filter.
     */
    public function withProfanityFilter(bool $profanityFilter): self
    {
        $obj = clone $this;
        $obj->profanity_filter = $profanityFilter;

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
        $obj->speech_context = $speechContext;

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
        $obj['transcription_engine'] = $transcriptionEngine;

        return $obj;
    }

    /**
     * Enables enhanced transcription, this works for models `phone_call` and `video`.
     */
    public function withUseEnhanced(bool $useEnhanced): self
    {
        $obj = clone $this;
        $obj->use_enhanced = $useEnhanced;

        return $obj;
    }
}
