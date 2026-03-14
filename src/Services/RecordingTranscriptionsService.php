<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RecordingTranscriptions\RecordingTranscription;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RecordingTranscriptionsContract;

/**
 * Call Recordings operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
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
     * @param Filter|FilterShape $filter filter recording transcriptions by various attributes
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RecordingTranscription>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingTranscriptionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($recordingTranscriptionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
