<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionEngineTelnyxConfig\TranscriptionModel;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TranscriptionEngineTelnyxConfigShape = array{
 *   language?: value-of<TelnyxTranscriptionLanguage>|null,
 *   transcription_engine?: value-of<TranscriptionEngine>|null,
 *   transcription_model?: value-of<TranscriptionModel>|null,
 * }
 */
final class TranscriptionEngineTelnyxConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionEngineTelnyxConfigShape> */
    use SdkModel;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<TelnyxTranscriptionLanguage>|null $language
     */
    #[Api(enum: TelnyxTranscriptionLanguage::class, optional: true)]
    public ?string $language;

    /**
     * Engine identifier for Telnyx transcription service.
     *
     * @var value-of<TranscriptionEngine>|null $transcription_engine
     */
    #[Api(enum: TranscriptionEngine::class, optional: true)]
    public ?string $transcription_engine;

    /**
     * The model to use for transcription.
     *
     * @var value-of<TranscriptionModel>|null $transcription_model
     */
    #[Api(enum: TranscriptionModel::class, optional: true)]
    public ?string $transcription_model;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TelnyxTranscriptionLanguage|value-of<TelnyxTranscriptionLanguage> $language
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcription_engine
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcription_model
     */
    public static function with(
        TelnyxTranscriptionLanguage|string|null $language = null,
        TranscriptionEngine|string|null $transcription_engine = null,
        TranscriptionModel|string|null $transcription_model = null,
    ): self {
        $obj = new self;

        null !== $language && $obj['language'] = $language;
        null !== $transcription_engine && $obj['transcription_engine'] = $transcription_engine;
        null !== $transcription_model && $obj['transcription_model'] = $transcription_model;

        return $obj;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param TelnyxTranscriptionLanguage|value-of<TelnyxTranscriptionLanguage> $language
     */
    public function withLanguage(
        TelnyxTranscriptionLanguage|string $language
    ): self {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * Engine identifier for Telnyx transcription service.
     *
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     */
    public function withTranscriptionEngine(
        TranscriptionEngine|string $transcriptionEngine
    ): self {
        $obj = clone $this;
        $obj['transcription_engine'] = $transcriptionEngine;

        return $obj;
    }

    /**
     * The model to use for transcription.
     *
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public function withTranscriptionModel(
        TranscriptionModel|string $transcriptionModel
    ): self {
        $obj = clone $this;
        $obj['transcription_model'] = $transcriptionModel;

        return $obj;
    }
}
