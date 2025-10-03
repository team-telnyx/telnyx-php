<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     * @throws APIException
     */
    public function list(
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
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
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
