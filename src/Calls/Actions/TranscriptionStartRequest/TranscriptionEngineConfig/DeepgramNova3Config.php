<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config\Language;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeepgramNova3ConfigShape = array{
 *   transcriptionEngine?: 'Deepgram',
 *   transcriptionModel: value-of<TranscriptionModel>,
 *   keywordsBoosting?: array<string,float>|null,
 *   language?: value-of<Language>|null,
 * }
 */
final class DeepgramNova3Config implements BaseModel
{
    /** @use SdkModel<DeepgramNova3ConfigShape> */
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
     * DeepgramNova3Config::with(transcriptionModel: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepgramNova3Config)->withTranscriptionModel(...)
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
     * @param array<string,float> $keywordsBoosting
     * @param Language|value-of<Language> $language
     */
    public static function with(
        TranscriptionModel|string $transcriptionModel,
        ?array $keywordsBoosting = null,
        Language|string|null $language = null,
    ): self {
        $obj = new self;

        $obj['transcriptionModel'] = $transcriptionModel;

        null !== $keywordsBoosting && $obj['keywordsBoosting'] = $keywordsBoosting;
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
        $obj['transcriptionModel'] = $transcriptionModel;

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
        $obj['keywordsBoosting'] = $keywordsBoosting;

        return $obj;
    }

    /**
     * Language to use for speech recognition with nova-3 model.
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
