<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio;

use Telnyx\AI\Audio\AudioTranscribeParams\Model;
use Telnyx\AI\Audio\AudioTranscribeParams\ResponseFormat;
use Telnyx\AI\Audio\AudioTranscribeParams\TimestampGranularities;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Transcribe speech to text. This endpoint is consistent with the [OpenAI Transcription API](https://platform.openai.com/docs/api-reference/audio/createTranscription) and may be used with the OpenAI JS or Python SDK.
 *
 * @see Telnyx\Services\AI\AudioService::transcribe()
 *
 * @phpstan-type AudioTranscribeParamsShape = array{
 *   model: Model|value-of<Model>,
 *   file?: string|null,
 *   fileURL?: string|null,
 *   responseFormat?: null|ResponseFormat|value-of<ResponseFormat>,
 *   timestampGranularities?: null|TimestampGranularities|value-of<TimestampGranularities>,
 * }
 */
final class AudioTranscribeParams implements BaseModel
{
    /** @use SdkModel<AudioTranscribeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency.
     *
     * @var value-of<Model> $model
     */
    #[Required(enum: Model::class)]
    public string $model;

    /**
     * The audio file object to transcribe, in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. File uploads are limited to 100 MB. Cannot be used together with `file_url`.
     */
    #[Optional]
    public ?string $file;

    /**
     * Link to audio file in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. Support for hosted files is limited to 100MB. Cannot be used together with `file`.
     */
    #[Optional('file_url')]
    public ?string $fileURL;

    /**
     * The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
     *
     * @var value-of<ResponseFormat>|null $responseFormat
     */
    #[Optional('response_format', enum: ResponseFormat::class)]
    public ?string $responseFormat;

    /**
     * The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
     *
     * @var value-of<TimestampGranularities>|null $timestampGranularities
     */
    #[Optional('timestamp_granularities[]', enum: TimestampGranularities::class)]
    public ?string $timestampGranularities;

    /**
     * `new AudioTranscribeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AudioTranscribeParams::with(model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AudioTranscribeParams)->withModel(...)
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
     * @param Model|value-of<Model> $model
     * @param ResponseFormat|value-of<ResponseFormat> $responseFormat
     * @param TimestampGranularities|value-of<TimestampGranularities> $timestampGranularities
     */
    public static function with(
        Model|string $model = 'distil-whisper/distil-large-v2',
        ?string $file = null,
        ?string $fileURL = null,
        ResponseFormat|string|null $responseFormat = null,
        TimestampGranularities|string|null $timestampGranularities = null,
    ): self {
        $self = new self;

        $self['model'] = $model;

        null !== $file && $self['file'] = $file;
        null !== $fileURL && $self['fileURL'] = $fileURL;
        null !== $responseFormat && $self['responseFormat'] = $responseFormat;
        null !== $timestampGranularities && $self['timestampGranularities'] = $timestampGranularities;

        return $self;
    }

    /**
     * ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency.
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
     * The audio file object to transcribe, in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. File uploads are limited to 100 MB. Cannot be used together with `file_url`.
     */
    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * Link to audio file in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. Support for hosted files is limited to 100MB. Cannot be used together with `file`.
     */
    public function withFileURL(string $fileURL): self
    {
        $self = clone $this;
        $self['fileURL'] = $fileURL;

        return $self;
    }

    /**
     * The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
     *
     * @param ResponseFormat|value-of<ResponseFormat> $responseFormat
     */
    public function withResponseFormat(
        ResponseFormat|string $responseFormat
    ): self {
        $self = clone $this;
        $self['responseFormat'] = $responseFormat;

        return $self;
    }

    /**
     * The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
     *
     * @param TimestampGranularities|value-of<TimestampGranularities> $timestampGranularities
     */
    public function withTimestampGranularities(
        TimestampGranularities|string $timestampGranularities
    ): self {
        $self = clone $this;
        $self['timestampGranularities'] = $timestampGranularities;

        return $self;
    }
}
