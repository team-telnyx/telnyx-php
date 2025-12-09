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
     * @api
     */
    public RecordingTranscriptionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecordingTranscriptionsRawService($client);
    }

    /**
     * @api
     *
     * Retrieves the details of an existing recording transcription.
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($recordingTranscriptionID, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($recordingTranscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
