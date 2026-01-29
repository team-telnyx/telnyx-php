<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpeechToTextContract;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\Model;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\TranscriptionEngine;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpeechToTextService implements SpeechToTextContract
{
    /**
     * @api
     */
    public SpeechToTextRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeechToTextRawService($client);
    }

    /**
     * @api
     *
     * Transcribe audio streams to text over WebSocket.
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'inputFormat' => $inputFormat,
                'transcriptionEngine' => $transcriptionEngine,
                'interimResults' => $interimResults,
                'language' => $language,
                'model' => $model,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->transcribe(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
