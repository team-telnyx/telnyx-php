<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Audio\AudioTranscribeParams\Model;
use Telnyx\AI\Audio\AudioTranscribeParams\ResponseFormat;
use Telnyx\AI\Audio\AudioTranscribeParams\TimestampGranularities;
use Telnyx\AI\Audio\AudioTranscribeResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AudioContract
{
    /**
     * @api
     *
     * @param Model|value-of<Model> $model ID of the model to use. `distil-whisper/distil-large-v2` is lower latency but English-only. `openai/whisper-large-v3-turbo` is multi-lingual but slightly higher latency.
     * @param string $file The audio file object to transcribe, in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. File uploads are limited to 100 MB. Cannot be used together with `file_url`
     * @param string $fileURL Link to audio file in one of these formats: flac, mp3, mp4, mpeg, mpga, m4a, ogg, wav, or webm. Support for hosted files is limited to 100MB. Cannot be used together with `file`
     * @param ResponseFormat|value-of<ResponseFormat> $responseFormat The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
     * @param TimestampGranularities|value-of<TimestampGranularities> $timestampGranularities The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
     */
    public function transcribe(
        $model = 'distil-whisper/distil-large-v2',
        $file = omit,
        $fileURL = omit,
        $responseFormat = omit,
        $timestampGranularities = omit,
        ?RequestOptions $requestOptions = null,
    ): AudioTranscribeResponse;
}
