<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionEngineBConfig\Language;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig\TranscriptionEngine;
use Telnyx\Calls\Actions\TranscriptionEngineBConfig\TranscriptionModel;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type transcription_engine_b_config = array{
 *   language?: value-of<Language>|null,
 *   transcriptionEngine?: value-of<TranscriptionEngine>|null,
 *   transcriptionModel?: value-of<TranscriptionModel>|null,
 * }
 */
final class TranscriptionEngineBConfig implements BaseModel
{
    /** @use SdkModel<transcription_engine_b_config> */
    use SdkModel;

    /**
     * Language to use for speech recognition.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
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
     * @param Language|value-of<Language> $language
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     * @param TranscriptionModel|value-of<TranscriptionModel> $transcriptionModel
     */
    public static function with(
        Language|string|null $language = null,
        TranscriptionEngine|string|null $transcriptionEngine = null,
        TranscriptionModel|string|null $transcriptionModel = null,
    ): self {
        $obj = new self;

        null !== $language && $obj->language = $language instanceof Language ? $language->value : $language;
        null !== $transcriptionEngine && $obj->transcriptionEngine = $transcriptionEngine instanceof TranscriptionEngine ? $transcriptionEngine->value : $transcriptionEngine;
        null !== $transcriptionModel && $obj->transcriptionModel = $transcriptionModel instanceof TranscriptionModel ? $transcriptionModel->value : $transcriptionModel;

        return $obj;
    }

    /**
     * Language to use for speech recognition.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj->language = $language instanceof Language ? $language->value : $language;

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
        $obj->transcriptionEngine = $transcriptionEngine instanceof TranscriptionEngine ? $transcriptionEngine->value : $transcriptionEngine;

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
        $obj->transcriptionModel = $transcriptionModel instanceof TranscriptionModel ? $transcriptionModel->value : $transcriptionModel;

        return $obj;
    }
}
