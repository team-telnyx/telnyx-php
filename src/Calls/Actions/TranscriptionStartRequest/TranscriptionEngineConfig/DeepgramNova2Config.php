<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config\Language;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config\TranscriptionModel;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeepgramNova2ConfigShape = array{
 *   transcription_engine: 'Deepgram',
 *   transcription_model: value-of<TranscriptionModel>,
 *   keywords_boosting?: array<string,float>|null,
 *   language?: value-of<Language>|null,
 * }
 */
final class DeepgramNova2Config implements BaseModel
{
    /** @use SdkModel<DeepgramNova2ConfigShape> */
    use SdkModel;

    /** @var 'Deepgram' $transcription_engine */
    #[Api]
    public string $transcription_engine = 'Deepgram';

    /** @var value-of<TranscriptionModel> $transcription_model */
    #[Api(enum: TranscriptionModel::class)]
    public string $transcription_model;

    /**
     * Keywords and their respective intensifiers (boosting values) to improve transcription accuracy for specific words or phrases. The intensifier should be a numeric value. Example: `{"snuffleupagus": 5, "systrom": 2, "krieger": 1}`.
     *
     * @var array<string,float>|null $keywords_boosting
     */
    #[Api(map: 'float', optional: true)]
    public ?array $keywords_boosting;

    /**
     * Language to use for speech recognition with nova-2 model.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * `new DeepgramNova2Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepgramNova2Config::with(transcription_model: ...)
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
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcription_model
     * @param array<string,float> $keywords_boosting
     * @param Language|value-of<Language> $language
     */
    public static function with(
        TranscriptionModel|string $transcription_model,
        ?array $keywords_boosting = null,
        Language|string|null $language = null,
    ): self {
        $obj = new self;

        $obj['transcription_model'] = $transcription_model;

        null !== $keywords_boosting && $obj['keywords_boosting'] = $keywords_boosting;
        null !== $language && $obj['language'] = $language;

        return $obj;
    }

    /**
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public function withTranscriptionModel(
        TranscriptionModel|string $transcriptionModel
    ): self {
        $obj = clone $this;
        $obj['transcription_model'] = $transcriptionModel;

        return $obj;
    }

    /**
     * Keywords and their respective intensifiers (boosting values) to improve transcription accuracy for specific words or phrases. The intensifier should be a numeric value. Example: `{"snuffleupagus": 5, "systrom": 2, "krieger": 1}`.
     *
     * @param array<string,float> $keywordsBoosting
     */
    public function withKeywordsBoosting(array $keywordsBoosting): self
    {
        $obj = clone $this;
        $obj['keywords_boosting'] = $keywordsBoosting;

        return $obj;
    }

    /**
     * Language to use for speech recognition with nova-2 model.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }
}
