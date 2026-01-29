<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\Model;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\TranscriptionEngine;

/**
 * Transcribe audio streams to text over WebSocket.
 *
 * @see Telnyx\Services\SpeechToTextService::transcribe()
 *
 * @phpstan-type SpeechToTextTranscribeParamsShape = array{
 *   inputFormat: InputFormat|value-of<InputFormat>,
 *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
 *   interimResults?: bool|null,
 *   language?: string|null,
 *   model?: null|Model|value-of<Model>,
 * }
 */
final class SpeechToTextTranscribeParams implements BaseModel
{
    /** @use SdkModel<SpeechToTextTranscribeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The format of input audio stream.
     *
     * @var value-of<InputFormat> $inputFormat
     */
    #[Required(enum: InputFormat::class)]
    public string $inputFormat;

    /**
     * The transcription engine to use for processing the audio stream.
     *
     * @var value-of<TranscriptionEngine> $transcriptionEngine
     */
    #[Required(enum: TranscriptionEngine::class)]
    public string $transcriptionEngine;

    /**
     * Whether to receive interim transcription results.
     */
    #[Optional]
    public ?bool $interimResults;

    /**
     * The language spoken in the audio stream.
     */
    #[Optional]
    public ?string $language;

    /**
     * The specific model to use within the selected transcription engine.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

    /**
     * `new SpeechToTextTranscribeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpeechToTextTranscribeParams::with(inputFormat: ..., transcriptionEngine: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpeechToTextTranscribeParams)
     *   ->withInputFormat(...)
     *   ->withTranscriptionEngine(...)
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
     * @param InputFormat|value-of<InputFormat> $inputFormat
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine
     * @param Model|value-of<Model>|null $model
     */
    public static function with(
        InputFormat|string $inputFormat,
        TranscriptionEngine|string $transcriptionEngine,
        ?bool $interimResults = null,
        ?string $language = null,
        Model|string|null $model = null,
    ): self {
        $self = new self;

        $self['inputFormat'] = $inputFormat;
        $self['transcriptionEngine'] = $transcriptionEngine;

        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $language && $self['language'] = $language;
        null !== $model && $self['model'] = $model;

        return $self;
    }

    /**
     * The format of input audio stream.
     *
     * @param InputFormat|value-of<InputFormat> $inputFormat
     */
    public function withInputFormat(InputFormat|string $inputFormat): self
    {
        $self = clone $this;
        $self['inputFormat'] = $inputFormat;

        return $self;
    }

    /**
     * The transcription engine to use for processing the audio stream.
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
     * Whether to receive interim transcription results.
     */
    public function withInterimResults(bool $interimResults): self
    {
        $self = clone $this;
        $self['interimResults'] = $interimResults;

        return $self;
    }

    /**
     * The language spoken in the audio stream.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The specific model to use within the selected transcription engine.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
