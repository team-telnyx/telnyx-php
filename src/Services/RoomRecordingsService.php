<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListParams\Page;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page as PageShape1
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
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

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
     * @param \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteBulk(
        \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter|array|null $filter = null,
        \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomRecordingDeleteBulkResponse {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBulk(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
