<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\DeepgramNova2Config\Language;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\DeepgramNova2Config\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeepgramNova2ConfigShape = array{
 *   transcriptionEngine: 'Deepgram',
 *   transcriptionModel: TranscriptionModel|value-of<TranscriptionModel>,
 *   keywordsBoosting?: array<string,float>|null,
 *   language?: null|Language|value-of<Language>,
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
        ?array $keywordsBoosting = null,
        Language|string|null $language = null,
    ): self {
        $self = new self;

        $self['transcriptionModel'] = $transcriptionModel;

        null !== $keywordsBoosting && $self['keywordsBoosting'] = $keywordsBoosting;
        null !== $language && $self['language'] = $language;

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
}
