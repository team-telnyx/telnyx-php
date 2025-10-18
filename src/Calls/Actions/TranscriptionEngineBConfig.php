<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineBConfig\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig\TranscriptionModel;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type transcription_engine_b_config = array{
 *   language?: value-of<TelnyxTranscriptionLanguage>,
 *   transcriptionEngine?: value-of<TranscriptionEngine>,
 *   transcriptionModel?: value-of<TranscriptionModel>,
 * }
 */
final class TranscriptionEngineBConfig implements BaseModel
{
    /** @use SdkModel<transcription_engine_b_config> */
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
     * @var value-of<TranscriptionEngine>|null $transcriptionEngine
     */
    #[Api(
        'transcription_engine',
        enum: TranscriptionEngine::class,
        optional: true
    )]
    public ?string $transcriptionEngine;

    /**
     * The model to use for transcription.
     *
     * @var value-of<TranscriptionModel>|null $transcriptionModel
     */
    #[Api('transcription_model', enum: TranscriptionModel::class, optional: true)]
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
     * @param TelnyxTranscriptionLanguage|value-of<TelnyxTranscriptionLanguage> $language
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public static function with(
        TelnyxTranscriptionLanguage|string|null $language = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        TranscriptionModel|string|null $transcriptionModel = null,
    ): self {
        $obj = new self;

        null !== $language && $obj['language'] = $language;
        null !== $transcriptionEngine && $obj['transcriptionEngine'] = $transcriptionEngine;
        null !== $transcriptionModel && $obj['transcriptionModel'] = $transcriptionModel;

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
        $obj['transcriptionEngine'] = $transcriptionEngine;

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
        $obj['transcriptionModel'] = $transcriptionModel;

        return $obj;
    }
}
