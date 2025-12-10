<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsContract;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   dateEndedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateStartedAt?: array{eq?: string, gte?: string, lte?: string},
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
     * @return DefaultPagination<RoomRecordingListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   dateEndedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateStartedAt?: array{eq?: string, gte?: string, lte?: string},
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
    ): RoomRecordingDeleteBulkResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBulk(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
