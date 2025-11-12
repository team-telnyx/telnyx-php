<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio;

use Telnyx\AI\Audio\AudioTranscribeParams\Model;
use Telnyx\AI\Audio\AudioTranscribeParams\ResponseFormat;
use Telnyx\AI\Audio\AudioTranscribeParams\TimestampGranularities;
use Telnyx\Core\Attributes\Api;
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
 *   file?: string,
 *   file_url?: string,
 *   response_format?: ResponseFormat|value-of<ResponseFormat>,
 *   timestamp_granularities__?: TimestampGranularities|value-of<TimestampGranularities>,
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
    #[Api(enum: Model::class)]
    public string $model;

    /**
     * The audio file object to transcribe, in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. File uploads are limited to 100 MB. Cannot be used together with `file_url`.
     */
    #[Api(optional: true)]
    public ?string $file;

    /**
     * Link to audio file in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. Support for hosted files is limited to 100MB. Cannot be used together with `file`.
     */
    #[Api(optional: true)]
    public ?string $file_url;

    /**
     * The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
     *
     * @var value-of<ResponseFormat>|null $response_format
     */
    #[Api(enum: ResponseFormat::class, optional: true)]
    public ?string $response_format;

    /**
     * The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
     *
     * @var value-of<TimestampGranularities>|null $timestamp_granularities__
     */
    #[Api(
        'timestamp_granularities[]',
        enum: TimestampGranularities::class,
        optional: true,
    )]
    public ?string $timestamp_granularities__;

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
     * @param ResponseFormat|value-of<ResponseFormat> $response_format
     * @param TimestampGranularities|value-of<TimestampGranularities> $timestamp_granularities__
     */
    public static function with(
        Model|string $model = 'distil-whisper/distil-large-v2',
        ?string $file = null,
        ?string $file_url = null,
        ResponseFormat|string|null $response_format = null,
        TimestampGranularities|string|null $timestamp_granularities__ = null,
    ): self {
        $obj = new self;

        $obj['model'] = $model;

        null !== $file && $obj->file = $file;
        null !== $file_url && $obj->file_url = $file_url;
        null !== $response_format && $obj['response_format'] = $response_format;
        null !== $timestamp_granularities__ && $obj['timestamp_granularities__'] = $timestamp_granularities__;

        return $obj;
    }

    /**
     * ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $obj = clone $this;
        $obj['model'] = $model;

        return $obj;
    }

    /**
     * The audio file object to transcribe, in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. File uploads are limited to 100 MB. Cannot be used together with `file_url`.
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    /**
     * Link to audio file in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. Support for hosted files is limited to 100MB. Cannot be used together with `file`.
     */
    public function withFileURL(string $fileURL): self
    {
        $obj = clone $this;
        $obj->file_url = $fileURL;

        return $obj;
    }

    /**
     * The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
     *
     * @param ResponseFormat|value-of<ResponseFormat> $responseFormat
     */
    public function withResponseFormat(
        ResponseFormat|string $responseFormat
    ): self {
        $obj = clone $this;
        $obj['response_format'] = $responseFormat;

        return $obj;
    }

    /**
     * The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
     *
     * @param TimestampGranularities|value-of<TimestampGranularities> $timestampGranularities
     */
    public function withTimestampGranularities(
        TimestampGranularities|string $timestampGranularities
    ): self {
        $obj = clone $this;
        $obj['timestamp_granularities__'] = $timestampGranularities;

        return $obj;
    }
}
