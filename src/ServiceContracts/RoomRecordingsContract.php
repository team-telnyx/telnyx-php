<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListParams\Page;
use Telnyx\RoomRecordings\RoomRecordingListResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomRecordingsContract
{
    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
    ): RoomRecordingGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RoomRecordingListResponse>
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
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBulk(
        \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter|array|null $filter = null,
        \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomRecordingDeleteBulkResponse;
}
