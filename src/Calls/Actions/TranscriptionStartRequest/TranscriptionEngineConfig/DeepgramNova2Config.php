<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config\Language;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeepgramNova2ConfigShape = array{
 *   transcriptionEngine: 'Deepgram',
 *   transcriptionModel: TranscriptionModel|value-of<TranscriptionModel>,
 *   interimResults?: bool|null,
 *   keywordsBoosting?: array<string,float>|null,
 *   language?: null|Language|value-of<Language>,
 *   utteranceEndMs?: int|null,
 * }
 */
final class DeepgramNova2Config implements BaseModel
{
    /** @use SdkModel<DeepgramNova2ConfigShape> */
    use SdkModel;

    /** @var 'Deepgram' $transcriptionEngine */
    #[Required('transcription_engine')]
    public string $transcriptionEngine = 'Deepgram';

    /** @var value-of<TranscriptionModel> $transcriptionModel */
    #[Required('transcription_model', enum: TranscriptionModel::class)]
    public string $transcriptionModel;

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    #[Optional('interim_results')]
    public ?bool $interimResults;

    /**
     * Keywords and their respective intensifiers (boosting values) to improve transcription accuracy for specific words or phrases. The intensifier should be a numeric value. Example: `{"snuffleupagus": 5, "systrom": 2, "krieger": 1}`.
     *
     * @var array<string,float>|null $keywordsBoosting
     */
    #[Optional('keywords_boosting', map: 'float')]
    public ?array $keywordsBoosting;

    /**
     * Language to use for speech recognition with nova-2 model.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * Number of milliseconds of silence to consider an utterance ended. Ranges from 0 to 5000 ms.
     */
    #[Optional('utterance_end_ms')]
    public ?int $utteranceEndMs;

    /**
     * `new DeepgramNova2Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepgramNova2Config::with(transcriptionModel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepgramNova2Config)->withTranscriptionModel(...)
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
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     * @param array<string,float>|null $keywordsBoosting
     * @param Language|value-of<Language>|null $language
     */
    public static function with(
        TranscriptionModel|string $transcriptionModel,
        ?bool $interimResults = null,
        ?array $keywordsBoosting = null,
        Language|string|null $language = null,
        ?int $utteranceEndMs = null,
    ): self {
        $self = new self;

        $self['transcriptionModel'] = $transcriptionModel;

        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $keywordsBoosting && $self['keywordsBoosting'] = $keywordsBoosting;
        null !== $language && $self['language'] = $language;
        null !== $utteranceEndMs && $self['utteranceEndMs'] = $utteranceEndMs;

        return $self;
    }

    /**
     * @param 'Deepgram' $transcriptionEngine
     */
    public function withTranscriptionEngine(string $transcriptionEngine): self
    {
        $self = clone $this;
        $self['transcriptionEngine'] = $transcriptionEngine;

        return $self;
    }

    /**
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public function withTranscriptionModel(
        TranscriptionModel|string $transcriptionModel
    ): self {
        $self = clone $this;
        $self['transcriptionModel'] = $transcriptionModel;

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
     * Keywords and their respective intensifiers (boosting values) to improve transcription accuracy for specific words or phrases. The intensifier should be a numeric value. Example: `{"snuffleupagus": 5, "systrom": 2, "krieger": 1}`.
     *
     * @param array<string,float> $keywordsBoosting
     */
    public function withKeywordsBoosting(array $keywordsBoosting): self
    {
        $self = clone $this;
        $self['keywordsBoosting'] = $keywordsBoosting;

        return $self;
    }

    /**
     * Language to use for speech recognition with nova-2 model.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Number of milliseconds of silence to consider an utterance ended. Ranges from 0 to 5000 ms.
     */
    public function withUtteranceEndMs(int $utteranceEndMs): self
    {
        $self = clone $this;
        $self['utteranceEndMs'] = $utteranceEndMs;

        return $self;
    }
}
