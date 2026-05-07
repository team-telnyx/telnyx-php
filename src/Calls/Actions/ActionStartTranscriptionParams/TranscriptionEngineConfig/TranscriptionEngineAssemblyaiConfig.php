<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineAssemblyaiConfig\TranscriptionEngine;
use Telnyx\Calls\Actions\ActionStartTranscriptionParams\TranscriptionEngineConfig\TranscriptionEngineAssemblyaiConfig\TranscriptionModel;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionEngineAssemblyaiConfigShape = array{
 *   interimResults?: bool|null,
 *   transcriptionEngine?: null|TranscriptionEngine|value-of<TranscriptionEngine>,
 *   transcriptionModel?: null|TranscriptionModel|value-of<TranscriptionModel>,
 * }
 */
final class TranscriptionEngineAssemblyaiConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionEngineAssemblyaiConfigShape> */
    use SdkModel;

    /**
     * Whether to send also interim results. If set to false, only final results will be sent.
     */
    #[Optional('interim_results')]
    public ?bool $interimResults;

    /**
     * Engine identifier for AssemblyAI transcription service.
     *
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Optional('transcription_engine', enum: TranscriptionEngine::class)]
    public ?string $transcriptionEngine;

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
     * @param TranscriptionEngine|value-of<TranscriptionEngine>|null $transcriptionEngine
     * @param TranscriptionModel|value-of<TranscriptionModel>|null $transcriptionModel
     */
    public static function with(
        ?bool $interimResults = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        TranscriptionModel|string|null $transcriptionModel = null,
    ): self {
        $self = new self;

        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $transcriptionEngine && $self['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionModel && $self['transcriptionModel'] = $transcriptionModel;

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
     * Engine identifier for AssemblyAI transcription service.
     *
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
