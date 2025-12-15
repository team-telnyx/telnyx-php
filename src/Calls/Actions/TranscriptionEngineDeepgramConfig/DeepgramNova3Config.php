<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig;

use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3Config\Language;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3Config\TranscriptionEngine;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeepgramNova3ConfigShape = array{
 *   transcriptionEngine: value-of<TranscriptionEngine>,
 *   transcriptionModel?: 'deepgram/nova-3',
 *   keywordsBoosting?: array<string,float>|null,
 *   language?: value-of<Language>|null,
 * }
 */
final class DeepgramNova3Config implements BaseModel
{
    /** @use SdkModel<DeepgramNova3ConfigShape> */
    use SdkModel;

    /** @var 'deepgram/nova-3' $transcriptionModel */
    #[Required('transcription_model')]
    public string $transcriptionModel = 'deepgram/nova-3';

    /** @var value-of<TranscriptionEngine> $transcriptionEngine */
    #[Required('transcription_engine', enum: TranscriptionEngine::class)]
    public string $transcriptionEngine;

    /**
     * Keywords and their respective intensifiers (boosting values) to improve transcription accuracy for specific words or phrases. The intensifier should be a numeric value. Example: `{"snuffleupagus": 5, "systrom": 2, "krieger": 1}`.
     *
     * @var array<string,float>|null $keywordsBoosting
     */
    #[Optional('keywords_boosting', map: 'float')]
    public ?array $keywordsBoosting;

    /**
     * Language to use for speech recognition with nova-3 model.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * `new DeepgramNova3Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepgramNova3Config::with(transcriptionEngine: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepgramNova3Config)->withTranscriptionEngine(...)
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
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     * @param array<string,float> $keywordsBoosting
     * @param Language|value-of<Language> $language
     */
    public static function with(
        TranscriptionEngine|string $transcriptionEngine,
        ?array $keywordsBoosting = null,
        Language|string|null $language = null,
    ): self {
        $self = new self;

        $self['transcriptionEngine'] = $transcriptionEngine;

        null !== $keywordsBoosting && $self['keywordsBoosting'] = $keywordsBoosting;
        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
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
     * Language to use for speech recognition with nova-3 model.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
