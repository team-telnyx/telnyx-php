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
     * Transcribe audio streams to text over WebSocket.
     *
     * @param array{
     *   inputFormat: InputFormat|value-of<InputFormat>,
     *   transcriptionEngine: TranscriptionEngine|value-of<TranscriptionEngine>,
     *   interimResults?: bool,
     *   language?: string,
     *   model?: value-of<Model>,
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
            options: $options,
            convert: null,
        );
    }
}
