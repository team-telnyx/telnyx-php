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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AudioTranscribeParams); // set properties as needed
 * $client->ai.audio->transcribe(...$params->toArray());
 * ```
 * Transcribe speech to text. This endpoint is consistent with the [OpenAI Transcription API](https://platform.openai.com/docs/api-reference/audio/createTranscription) and may be used with the OpenAI JS or Python SDK.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.audio->transcribe(...$params->toArray());`
 *
 * @see Telnyx\AI\Audio->transcribe
 *
 * @phpstan-type audio_transcribe_params = array{
 *   model: Model|value-of<Model>,
 *   file?: string,
 *   fileURL?: string,
 *   responseFormat?: ResponseFormat|value-of<ResponseFormat>,
 *   timestampGranularities?: TimestampGranularities|value-of<TimestampGranularities>,
 * }
 */
final class AudioTranscribeParams implements BaseModel
{
    /** @use SdkModel<audio_transcribe_params> */
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
    #[Api('file_url', optional: true)]
    public ?string $fileURL;

    /**
     * The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
     *
     * @var value-of<ResponseFormat>|null $responseFormat
     */
    #[Api('response_format', enum: ResponseFormat::class, optional: true)]
    public ?string $responseFormat;

    /**
     * The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
     *
     * @var value-of<TimestampGranularities>|null $timestampGranularities
     */
    #[Api(
        'timestamp_granularities[]',
        enum: TimestampGranularities::class,
        optional: true,
    )]
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
        $obj = new self;

        $obj['model'] = $model;

        null !== $file && $obj->file = $file;
        null !== $fileURL && $obj->fileURL = $fileURL;
        null !== $responseFormat && $obj['responseFormat'] = $responseFormat;
        null !== $timestampGranularities && $obj['timestampGranularities'] = $timestampGranularities;

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
        $obj->fileURL = $fileURL;

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
        $obj['responseFormat'] = $responseFormat;

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
        $obj['timestampGranularities'] = $timestampGranularities;

        return $obj;
    }
}
