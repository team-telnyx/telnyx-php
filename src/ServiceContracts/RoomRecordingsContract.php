<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter as Filter1;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page as Page1;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListParams\Page;
use Telnyx\RoomRecordings\RoomRecordingListResponse;

use const Telnyx\Core\OMIT as omit;

interface RoomRecordingsContract
{
    /**
     * @api
     *
     * @return RoomRecordingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingGetResponse;

    /**
     * @api
     *
     * @return RoomRecordingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $roomRecordingID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return RoomRecordingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RoomRecordingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $roomRecordingID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param Page1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return RoomRecordingDeleteBulkResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteBulk(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingDeleteBulkResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RoomRecordingDeleteBulkResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteBulkRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingDeleteBulkResponse;
}
