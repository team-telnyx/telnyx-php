<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig;

use Telnyx\Calls\Actions\DeepgramEnglishTranscriptionLanguage;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2SpecialtyConfig\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2SpecialtyConfig\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deepgram Nova-2 specialty models: `deepgram/nova-2-medical` (medical vocabulary) and `deepgram/nova-2-phonecall` (low-bandwidth phone audio). English only.
 *
 * @phpstan-type DeepgramNova2SpecialtyConfigShape = array{
 *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionModel: TranscriptionModel|value-of<TranscriptionModel>,
 *   hints?: list<string>|null,
 *   interimResults?: bool|null,
 *   keywordsBoosting?: array<string,float>|null,
 *   language?: null|DeepgramEnglishTranscriptionLanguage|value-of<DeepgramEnglishTranscriptionLanguage>,
 *   smartFormat?: bool|null,
 *   utteranceEndMs?: int|null,
 * }
 */
final class DeepgramNova2SpecialtyConfig implements BaseModel
{
    /** @use SdkModel<DeepgramNova2SpecialtyConfigShape> */
    use SdkModel;

    /** @var value-of<TranscriptionEngine> $transcriptionEngine */
    #[Required('transcription_engine', enum: TranscriptionEngine::class)]
    public string $transcriptionEngine;

    /** @var value-of<TranscriptionModel> $transcriptionModel */
    #[Required('transcription_model', enum: TranscriptionModel::class)]
    public string $transcriptionModel;

    /**
     * Nova-2 keyword biasing without intensifiers. Up to 100 terms to bias recognition toward. For weighted biasing, use `keywords_boosting` instead. Supported on Nova-2 models only (`deepgram/nova-2`, `deepgram/nova-2-medical`, `deepgram/nova-2-phonecall`); use `keyterms` on Nova-3 and Flux.
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
     * Keywords and their respective intensifiers (boosting values) to improve transcription accuracy for specific words or phrases. The intensifier should be a numeric value. Example: `{"snuffleupagus": 5, "systrom": 2, "krieger": 1}`.
     *
     * @var array<string,float>|null $keywordsBoosting
     */
    #[Optional('keywords_boosting', map: 'float')]
    public ?array $keywordsBoosting;

    /**
     * Language to transcribe. Deepgram's medical and phonecall models support English only.
     *
     * @var value-of<DeepgramEnglishTranscriptionLanguage>|null $language
     */
    #[Optional(enum: DeepgramEnglishTranscriptionLanguage::class)]
    public ?string $language;

    /**
     * Enable Deepgram's smart formatting (capitalization, punctuation, and digit normalization). Note: Telnyx defaults this to `true`, overriding Deepgram's underlying default of `false` — omit the field to get a smart-formatted transcript, or set it to `false` to receive the raw lowercase transcript without punctuation.
     */
    #[Optional('smart_format')]
    public ?bool $smartFormat;

    /**
     * Number of milliseconds of silence to consider an utterance ended. Ranges from 0 to 5000 ms.
     */
    #[Optional('utterance_end_ms')]
    public ?int $utteranceEndMs;

    /**
     * `new DeepgramNova2SpecialtyConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepgramNova2SpecialtyConfig::with(
     *   transcriptionEngine: ..., transcriptionModel: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepgramNova2SpecialtyConfig)
     *   ->withTranscriptionEngine(...)
     *   ->withTranscriptionModel(...)
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
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     * @param list<string>|null $hints
     * @param array<string,float>|null $keywordsBoosting
     * @param DeepgramEnglishTranscriptionLanguage|value-of<DeepgramEnglishTranscriptionLanguage>|null $language
     */
    public static function with(
        TranscriptionEngine|string $transcriptionEngine,
        TranscriptionModel|string $transcriptionModel,
        ?array $hints = null,
        ?bool $interimResults = null,
        ?array $keywordsBoosting = null,
        DeepgramEnglishTranscriptionLanguage|string|null $language = null,
        ?bool $smartFormat = null,
        ?int $utteranceEndMs = null,
    ): self {
        $self = new self;

        $self['transcriptionEngine'] = $transcriptionEngine;
        $self['transcriptionModel'] = $transcriptionModel;

        null !== $hints && $self['hints'] = $hints;
        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $keywordsBoosting && $self['keywordsBoosting'] = $keywordsBoosting;
        null !== $language && $self['language'] = $language;
        null !== $smartFormat && $self['smartFormat'] = $smartFormat;
        null !== $utteranceEndMs && $self['utteranceEndMs'] = $utteranceEndMs;

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
     * Nova-2 keyword biasing without intensifiers. Up to 100 terms to bias recognition toward. For weighted biasing, use `keywords_boosting` instead. Supported on Nova-2 models only (`deepgram/nova-2`, `deepgram/nova-2-medical`, `deepgram/nova-2-phonecall`); use `keyterms` on Nova-3 and Flux.
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
     * Language to transcribe. Deepgram's medical and phonecall models support English only.
     *
     * @param DeepgramEnglishTranscriptionLanguage|value-of<DeepgramEnglishTranscriptionLanguage> $language
     */
    public function withLanguage(
        DeepgramEnglishTranscriptionLanguage|string $language
    ): self {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Enable Deepgram's smart formatting (capitalization, punctuation, and digit normalization). Note: Telnyx defaults this to `true`, overriding Deepgram's underlying default of `false` — omit the field to get a smart-formatted transcript, or set it to `false` to receive the raw lowercase transcript without punctuation.
     */
    public function withSmartFormat(bool $smartFormat): self
    {
        $self = clone $this;
        $self['smartFormat'] = $smartFormat;

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
