<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return RecordingTranscriptionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionGetResponse {
        $params = [];

        return $this->retrieveRaw(
            $recordingTranscriptionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @return RecordingTranscriptionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $recordingTranscriptionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingTranscriptionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['recording_transcriptions/%1$s', $recordingTranscriptionID],
            options: $requestOptions,
            convert: RecordingTranscriptionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your recording transcriptions.
     *
     * @return RecordingTranscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return RecordingTranscriptionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'recording_transcriptions',
            options: $requestOptions,
            convert: RecordingTranscriptionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @return RecordingTranscriptionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionDeleteResponse {
        $params = [];

        return $this->deleteRaw(
            $recordingTranscriptionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @return RecordingTranscriptionDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $recordingTranscriptionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingTranscriptionDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['recording_transcriptions/%1$s', $recordingTranscriptionID],
            options: $requestOptions,
            convert: RecordingTranscriptionDeleteResponse::class,
        );
    }
}
