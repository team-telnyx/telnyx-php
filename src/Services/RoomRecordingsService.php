<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsContract;

/**
 * Rooms Recordings operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RoomRecordingsService implements RoomRecordingsContract
{
    /**
     * @api
     */
    public RoomRecordingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RoomRecordingsRawService($client);
    }

    /**
     * @api
     *
     * View a room recording.
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
    ): RoomRecordingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($roomRecordingID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room recordings.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RoomRecordingListResponse>
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
     * Synchronously delete a Room Recording.
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($roomRecordingID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete several room recordings in a bulk.
     *
     * @param \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBulk(
        \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomRecordingDeleteBulkResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBulk(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
