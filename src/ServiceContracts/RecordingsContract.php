<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams\Filter;
use Telnyx\Recordings\RecordingListParams\Page;
use Telnyx\Recordings\RecordingResponseData;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Recordings\RecordingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Recordings\RecordingListParams\Page
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id], filter[sip_call_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RecordingResponseData>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

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
