<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\Model;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\TranscriptionEngine;

interface SpeechToTextContract
{
    /**
     * @api
     *
     * @param 'mp3'|'wav'|InputFormat $inputFormat the format of input audio stream
     * @param 'Azure'|'Deepgram'|'Google'|'Telnyx'|TranscriptionEngine $transcriptionEngine the transcription engine to use for processing the audio stream
     * @param bool $interimResults whether to receive interim transcription results
     * @param string $language the language spoken in the audio stream
     * @param 'fast'|'deepgram/nova-2'|'deepgram/nova-3'|'latest_long'|'latest_short'|'command_and_search'|'phone_call'|'video'|'default'|'medical_conversation'|'medical_dictation'|'openai/whisper-tiny'|'openai/whisper-large-v3-turbo'|Model $model the specific model to use within the selected transcription engine
     *
     * @throws APIException
     */
    public function transcribe(
        string|InputFormat $inputFormat,
        string|TranscriptionEngine $transcriptionEngine,
        ?bool $interimResults = null,
        ?string $language = null,
        string|Model|null $model = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
