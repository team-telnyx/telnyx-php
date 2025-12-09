<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListResponse;

interface RoomRecordingsContract
{
    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
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
     * @param array{
     *   dateEndedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateStartedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   durationSecs?: int,
     *   participantID?: string,
     *   roomID?: string,
     *   sessionID?: string,
     *   status?: string,
     *   type?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingListResponse;

    /**
     * @api
     *
     * @param string $roomRecordingID the unique identifier of a room recording
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
     * @param array{
     *   dateEndedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateStartedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   durationSecs?: int,
     *   participantID?: string,
     *   roomID?: string,
     *   sessionID?: string,
     *   status?: string,
     *   type?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function deleteBulk(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingDeleteBulkResponse;
}
