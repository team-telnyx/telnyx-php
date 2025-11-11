<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig;

use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Deepgram\Language;
use Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\Deepgram\TranscriptionModel;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DeepgramShape = array{
 *   transcription_engine: "Deepgram",
 *   transcription_model: value-of<TranscriptionModel>,
 *   language?: value-of<Language>|null,
 * }
 */
final class Deepgram implements BaseModel
{
    /** @use SdkModel<DeepgramShape> */
    use SdkModel;

    /**
     * Engine identifier for Deepgram transcription service.
     *
     * @var "Deepgram" $transcription_engine
     */
    #[Api]
    public string $transcription_engine = 'Deepgram';

    /**
     * The model to use for transcription.
     *
     * @var value-of<TranscriptionModel> $transcription_model
     */
    #[Api(enum: TranscriptionModel::class)]
    public string $transcription_model;

    /**
     * Language to use for speech recognition. Available languages depend on the selected model.
     *
     * @var value-of<Language>|null $language
     */
    #[Api(enum: Language::class, optional: true)]
    public ?string $language;

    /**
     * `new Deepgram()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Deepgram::with(transcription_model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Deepgram)->withTranscriptionModel(...)
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
     * @param Language|value-of<Language> $language
     */
    public static function with(
        TranscriptionModel|string $transcription_model = 'deepgram/nova-2',
        Language|string|null $language = null,
    ): self {
        $obj = new self;

        $obj['transcription_model'] = $transcription_model;

        null !== $language && $obj['language'] = $language;

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

    /**
     * Language to use for speech recognition. Available languages depend on the selected model.
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
