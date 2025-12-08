<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RecordingTranscriptionsContract;

final class RecordingTranscriptionsService implements RecordingTranscriptionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the details of an existing recording transcription.
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionGetResponse {
        /** @var BaseResponse<RecordingTranscriptionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['recording_transcriptions/%1$s', $recordingTranscriptionID],
            options: $requestOptions,
            convert: RecordingTranscriptionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your recording transcriptions.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse {
        /** @var BaseResponse<RecordingTranscriptionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'recording_transcriptions',
            options: $requestOptions,
            convert: RecordingTranscriptionListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionDeleteResponse {
        /** @var BaseResponse<RecordingTranscriptionDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['recording_transcriptions/%1$s', $recordingTranscriptionID],
            options: $requestOptions,
            convert: RecordingTranscriptionDeleteResponse::class,
        );

        return $response->parse();
    }
}
