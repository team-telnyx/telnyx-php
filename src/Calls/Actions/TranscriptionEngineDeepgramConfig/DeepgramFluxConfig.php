<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig;

use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxConfig\Language;
use Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxConfig\TranscriptionEngine;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deepgram Flux (English), a conversational speech recognition model with built-in end-of-turn detection. `smart_format`, `utterance_end_ms`, `hints` and `keywords_boosting` do not apply to Flux.
 *
 * @phpstan-type DeepgramFluxConfigShape = array{
 *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionModel: 'deepgram/flux',
 *   interimResults?: bool|null,
 *   keyterms?: list<string>|null,
 *   language?: null|Language|value-of<Language>,
 * }
 */
final class DeepgramFluxConfig implements BaseModel
{
    /** @use SdkModel<DeepgramFluxConfigShape> */
    use SdkModel;

    /** @var 'deepgram/flux' $transcriptionModel */
    #[Required('transcription_model')]
    public string $transcriptionModel = 'deepgram/flux';

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
     * Language to transcribe. `deepgram/flux` supports English only.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * `new DeepgramFluxConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DeepgramFluxConfig::with(transcriptionEngine: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DeepgramFluxConfig)->withTranscriptionEngine(...)
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
     * @param Language|value-of<Language>|null $language
     */
    public static function with(
        TranscriptionEngine|string $transcriptionEngine,
        ?bool $interimResults = null,
        ?array $keyterms = null,
        Language|string|null $language = null,
    ): self {
        $self = new self;

        $self['transcriptionEngine'] = $transcriptionEngine;

        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $keyterms && $self['keyterms'] = $keyterms;
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
     * @param 'deepgram/flux' $transcriptionModel
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
     * Language to transcribe. `deepgram/flux` supports English only.
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
