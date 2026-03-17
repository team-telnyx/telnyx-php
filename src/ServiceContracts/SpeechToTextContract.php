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
     * @param int $endpointing Silence duration (in milliseconds) that triggers end-of-speech detection. When set, the engine uses this value to determine when a speaker has stopped talking. Not all engines support this parameter.
     * @param bool $interimResults whether to receive interim transcription results
     * @param string $keyterm A key term to boost in the transcription. The engine will be more likely to recognize this term. Can be specified multiple times for multiple terms.
     * @param string $keywords Comma-separated list of keywords to boost in the transcription. The engine will prioritize recognition of these words.
     * @param string $language the language spoken in the audio stream
     * @param Model|value-of<Model> $model the specific model to use within the selected transcription engine
     * @param string $redact Enable redaction of sensitive information (e.g., PCI data, SSN) from transcription results. Supported values depend on the transcription engine.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function transcribe(
        InputFormat|string $inputFormat,
        TranscriptionEngine|string $transcriptionEngine,
        ?int $endpointing = null,
        ?bool $interimResults = null,
        ?string $keyterm = null,
        ?string $keywords = null,
        ?string $language = null,
        Model|string|null $model = null,
        ?string $redact = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
