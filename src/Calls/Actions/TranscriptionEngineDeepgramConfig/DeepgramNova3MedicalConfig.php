<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig;

use Telnyx\Calls\Actions\DeepgramEnglishTranscriptionLanguage;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova3MedicalConfig\TranscriptionEngine;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deepgram Nova-3 medical model, tuned for medical vocabulary. English only.
 *
 * @phpstan-type DeepgramNova3MedicalConfigShape = array{
 *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionModel: 'deepgram/nova-3-medical',
 *   interimResults?: bool|null,
 *   keyterms?: list<string>|null,
 *   keywordsBoosting?: array<string,float>|null,
 *   language?: null|DeepgramEnglishTranscriptionLanguage|value-of<DeepgramEnglishTranscriptionLanguage>,
 *   smartFormat?: bool|null,
 *   utteranceEndMs?: int|null,
 * }
 */
final class DeepgramNova3MedicalConfig implements BaseModel
{
    /** @use SdkModel<DeepgramNova3MedicalConfigShape> */
    use SdkModel;

    /** @var 'deepgram/nova-3-medical' $transcriptionModel */
    #[Required('transcription_model')]
    public string $transcriptionModel = 'deepgram/nova-3-medical';

    /** @var value-of<TranscriptionEngine> $transcriptionEngine */
    #[Required('transcription_engine', enum: TranscriptionEngine::class)]
    public string $transcriptionEngine;

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    #[Optional('interim_results')]
    public ?bool $interimResults;

    /**
     * Keyterm prompting. Up to 100 domain-specific terms or brand names to bias recognition toward. Supported on Nova-3 and Flux models (`deepgram/nova-3`, `deepgram/nova-3-medical`, `deepgram/flux`, `deepgram/flux-multi`); use `hints` on Nova-2.
     *
     * @var list<string>|null $keyterms
     */
    #[Optional(list: 'string')]
    public ?array $keyterms;

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
     * `new DeepgramNova3MedicalConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepgramNova3MedicalConfig::with(transcriptionEngine: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepgramNova3MedicalConfig)->withTranscriptionEngine(...)
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
     * @param list<string>|null $keyterms
     * @param array<string,float>|null $keywordsBoosting
     * @param DeepgramEnglishTranscriptionLanguage|value-of<DeepgramEnglishTranscriptionLanguage>|null $language
     */
    public static function with(
        TranscriptionEngine|string $transcriptionEngine,
        ?bool $interimResults = null,
        ?array $keyterms = null,
        ?array $keywordsBoosting = null,
        DeepgramEnglishTranscriptionLanguage|string|null $language = null,
        ?bool $smartFormat = null,
        ?int $utteranceEndMs = null,
    ): self {
        $self = new self;

        $self['transcriptionEngine'] = $transcriptionEngine;

        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $keyterms && $self['keyterms'] = $keyterms;
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
     * @param 'deepgram/nova-3-medical' $transcriptionModel
     */
    public function withTranscriptionModel(string $transcriptionModel): self
    {
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
     * Keyterm prompting. Up to 100 domain-specific terms or brand names to bias recognition toward. Supported on Nova-3 and Flux models (`deepgram/nova-3`, `deepgram/nova-3-medical`, `deepgram/flux`, `deepgram/flux-multi`); use `hints` on Nova-2.
     *
     * @param list<string> $keyterms
     */
    public function withKeyterms(array $keyterms): self
    {
        $self = clone $this;
        $self['keyterms'] = $keyterms;

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
