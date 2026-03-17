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
 * Open a WebSocket connection to stream audio and receive transcriptions in real-time. Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header.
 *
 * Supported engines: `Azure`, `Deepgram`, `Google`, `Telnyx`.
 *
 * **Connection flow:**
 * 1. Open WebSocket with query parameters specifying engine, input format, and language.
 * 2. Send binary audio frames (mp3/wav format).
 * 3. Receive JSON transcript frames with `transcript`, `is_final`, and `confidence` fields.
 * 4. Close connection when done.
 *
 * @see Telnyx\Services\SpeechToTextService::transcribe()
 *
 * @phpstan-type SpeechToTextTranscribeParamsShape = array{
 *   inputFormat: InputFormat|value-of<InputFormat>,
 *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
 *   endpointing?: int|null,
 *   interimResults?: bool|null,
 *   keyterm?: string|null,
 *   keywords?: string|null,
 *   language?: string|null,
 *   model?: null|Model|value-of<Model>,
 *   redact?: string|null,
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
     * Silence duration (in milliseconds) that triggers end-of-speech detection. When set, the engine uses this value to determine when a speaker has stopped talking. Not all engines support this parameter.
     */
    #[Optional]
    public ?int $endpointing;

    /**
     * Whether to receive interim transcription results.
     */
    #[Optional]
    public ?bool $interimResults;

    /**
     * A key term to boost in the transcription. The engine will be more likely to recognize this term. Can be specified multiple times for multiple terms.
     */
    #[Optional]
    public ?string $keyterm;

    /**
     * Comma-separated list of keywords to boost in the transcription. The engine will prioritize recognition of these words.
     */
    #[Optional]
    public ?string $keywords;

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
     * Enable redaction of sensitive information (e.g., PCI data, SSN) from transcription results. Supported values depend on the transcription engine.
     */
    #[Optional]
    public ?string $redact;

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
        ?int $endpointing = null,
        ?bool $interimResults = null,
        ?string $keyterm = null,
        ?string $keywords = null,
        ?string $language = null,
        Model|string|null $model = null,
        ?string $redact = null,
    ): self {
        $self = new self;

        $self['inputFormat'] = $inputFormat;
        $self['transcriptionEngine'] = $transcriptionEngine;

        null !== $endpointing && $self['endpointing'] = $endpointing;
        null !== $interimResults && $self['interimResults'] = $interimResults;
        null !== $keyterm && $self['keyterm'] = $keyterm;
        null !== $keywords && $self['keywords'] = $keywords;
        null !== $language && $self['language'] = $language;
        null !== $model && $self['model'] = $model;
        null !== $redact && $self['redact'] = $redact;

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
     * Silence duration (in milliseconds) that triggers end-of-speech detection. When set, the engine uses this value to determine when a speaker has stopped talking. Not all engines support this parameter.
     */
    public function withEndpointing(int $endpointing): self
    {
        $self = clone $this;
        $self['endpointing'] = $endpointing;

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
     * A key term to boost in the transcription. The engine will be more likely to recognize this term. Can be specified multiple times for multiple terms.
     */
    public function withKeyterm(string $keyterm): self
    {
        $self = clone $this;
        $self['keyterm'] = $keyterm;

        return $self;
    }

    /**
     * Comma-separated list of keywords to boost in the transcription. The engine will prioritize recognition of these words.
     */
    public function withKeywords(string $keywords): self
    {
        $self = clone $this;
        $self['keywords'] = $keywords;

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

    /**
     * Enable redaction of sensitive information (e.g., PCI data, SSN) from transcription results. Supported values depend on the transcription engine.
     */
    public function withRedact(string $redact): self
    {
        $self = clone $this;
        $self['redact'] = $redact;

        return $self;
    }
}
