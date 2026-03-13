<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RecordingTranscriptions\RecordingTranscription;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecordingTranscriptionsContract
{
    /**
     * @api
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingTranscriptionGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): RecordingTranscriptionDeleteResponse;
}
