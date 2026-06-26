<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\TranscriptionEngineSonioxConfig\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionEngineSonioxConfigShape = array{
 *   transcriptionEngine: 'Soniox',
 *   enableEndpointDetection?: bool|null,
 *   interimResults?: bool|null,
 *   language?: string|null,
 *   maxEndpointDelayMs?: int|null,
 *   transcriptionModel?: null|TranscriptionModel|value-of<TranscriptionModel>,
 * }
 */
final class TranscriptionEngineSonioxConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionEngineSonioxConfigShape> */
    use SdkModel;

    /**
     * Engine identifier for Soniox transcription service.
     *
     * @var 'Soniox' $transcriptionEngine
     */
    #[Required('transcription_engine')]
    public string $transcriptionEngine = 'Soniox';

    /**
     * When true, Soniox emits end-of-utterance events at the cadence configured by `max_endpoint_delay_ms`.
     */
    #[Optional('enable_endpoint_detection')]
    public ?bool $enableEndpointDetection;

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    #[Optional('interim_results')]
    public ?bool $interimResults;

    /**
     * ISO 639-1 language hint (e.g. `en`, `es`), or `auto` to omit the hint and let Soniox auto-detect supported languages multilingually.
     */
    #[Optional]
    public ?string $language;

    /**
     * Maximum silence (in milliseconds) before Soniox emits an end-of-utterance event. Only honored when `enable_endpoint_detection` is true. Range: 500-3000 ms.
     */
    #[Optional('max_endpoint_delay_ms')]
    public ?int $maxEndpointDelayMs;

    /**
     * The model to use for transcription.
     *
     * @var value-of<TranscriptionModel>|null $transcriptionModel
     */
    #[Optional('transcription_model', enum: TranscriptionModel::class)]
    public ?string $transcriptionModel;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TranscriptionModel|value-of<TranscriptionModel>|null $transcriptionModel
     */
    public static function with(
        ?bool $enableEndpointDetection = null,
        ?bool $interimResults = null,
        ?string $language = null,
        ?int $maxEndpointDelayMs = null,
        TranscriptionModel|string|null $transcriptionModel = null,
    ): self {
        $self = new self;

        null !== $enableEndpointDetection && $self['enableEndpointDetection'] = $enableEndpointDetection;
        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $language && $self['language'] = $language;
        null !== $maxEndpointDelayMs && $self['maxEndpointDelayMs'] = $maxEndpointDelayMs;
        null !== $transcriptionModel && $self['transcriptionModel'] = $transcriptionModel;

        return $self;
    }

    /**
     * Engine identifier for Soniox transcription service.
     *
     * @param 'Soniox' $transcriptionEngine
     */
    public function withTranscriptionEngine(string $transcriptionEngine): self
    {
        $self = clone $this;
        $self['transcriptionEngine'] = $transcriptionEngine;

        return $self;
    }

    /**
     * When true, Soniox emits end-of-utterance events at the cadence configured by `max_endpoint_delay_ms`.
     */
    public function withEnableEndpointDetection(
        bool $enableEndpointDetection
    ): self {
        $self = clone $this;
        $self['enableEndpointDetection'] = $enableEndpointDetection;

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
     * ISO 639-1 language hint (e.g. `en`, `es`), or `auto` to omit the hint and let Soniox auto-detect supported languages multilingually.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Maximum silence (in milliseconds) before Soniox emits an end-of-utterance event. Only honored when `enable_endpoint_detection` is true. Range: 500-3000 ms.
     */
    public function withMaxEndpointDelayMs(int $maxEndpointDelayMs): self
    {
        $self = clone $this;
        $self['maxEndpointDelayMs'] = $maxEndpointDelayMs;

        return $self;
    }

    /**
     * The model to use for transcription.
     *
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public function withTranscriptionModel(
        TranscriptionModel|string $transcriptionModel
    ): self {
        $self = clone $this;
        $self['transcriptionModel'] = $transcriptionModel;

        return $self;
    }
}
