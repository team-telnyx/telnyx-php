<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams\Filter;
use Telnyx\Recordings\RecordingResponseData;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Recordings\RecordingListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecordingsContract
{
    /**
     * @api
     *
     * @param string $recordingID uniquely identifies the recording by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter filter recordings by various attributes
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RecordingResponseData>
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
     * @param string $recordingID uniquely identifies the recording by id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        RequestOptions|array|null $requestOptions = null
    ): RecordingDeleteResponse;
}
