<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Audio\AudioTranscribeParams;
use Telnyx\AI\Audio\AudioTranscribeParams\Model;
use Telnyx\AI\Audio\AudioTranscribeParams\ResponseFormat;
use Telnyx\AI\Audio\AudioTranscribeParams\TimestampGranularities;
use Telnyx\AI\Audio\AudioTranscribeResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AudioRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AudioRawService implements AudioRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Transcribe speech to text. This endpoint is consistent with the [OpenAI Transcription API](https://platform.openai.com/docs/api-reference/audio/createTranscription) and may be used with the OpenAI JS or Python SDK.
     *
     * @param array{
     *   model: Model|value-of<Model>,
     *   file?: string,
     *   fileURL?: string,
     *   responseFormat?: ResponseFormat|value-of<ResponseFormat>,
     *   timestampGranularities?: TimestampGranularities|value-of<TimestampGranularities>,
     * }|AudioTranscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AudioTranscribeResponse>
     *
     * @throws APIException
     */
    public function transcribe(
        array|AudioTranscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AudioTranscribeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/audio/transcriptions',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: AudioTranscribeResponse::class,
        );
    }
}
