<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SpeechToTextRawContract;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\InputFormat;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\Model;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams\TranscriptionEngine;

/**
 * Speech to text command operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpeechToTextRawService implements SpeechToTextRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
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
     * @param array{
     *   inputFormat: InputFormat|value-of<InputFormat>,
     *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
     *   endpointing?: int,
     *   interimResults?: bool,
     *   keyterm?: string,
     *   keywords?: string,
     *   language?: string,
     *   model?: value-of<Model>,
     *   redact?: string,
     * }|SpeechToTextTranscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function transcribe(
        array|SpeechToTextTranscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpeechToTextTranscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'speech-to-text/transcription',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'inputFormat' => 'input_format',
                    'transcriptionEngine' => 'transcription_engine',
                    'interimResults' => 'interim_results',
                ],
            ),
            headers: ['Content-Type' => 'application/octet-stream'],
            options: $options,
            convert: null,
        );
    }
}
