<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\Model;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\TranscriptionEngine;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpeechToTextContract
{
    /**
     * @api
     *
     * @param InputFormat|value-of<InputFormat> $inputFormat the format of input audio stream
     * @param TranscriptionEngine|value-of<TranscriptionEngine> $transcriptionEngine the transcription engine to use for processing the audio stream
     * @param bool $interimResults whether to receive interim transcription results
     * @param string $language the language spoken in the audio stream
     * @param Model|value-of<Model> $model the specific model to use within the selected transcription engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function transcribe(
        InputFormat|string $inputFormat,
        TranscriptionEngine|string $transcriptionEngine,
        ?bool $interimResults = null,
        ?string $language = null,
        Model|string|null $model = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
