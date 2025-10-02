<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListParams\Page;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsContract;

use const Telnyx\Core\OMIT as omit;

final class RoomRecordingsService implements RoomRecordingsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * View a room recording.
     *
     * @return RoomRecordingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingGetResponse {
        $params = [];

        return $this->retrieveRaw($roomRecordingID, $params, $requestOptions);
    }

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
    ): RoomRecordingGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['room_recordings/%1$s', $roomRecordingID],
            options: $requestOptions,
            convert: RoomRecordingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * View a list of room recordings.
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
    ): RoomRecordingListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): RoomRecordingListResponse {
        [$parsed, $options] = RoomRecordingListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'room_recordings',
            query: $parsed,
            options: $options,
            convert: RoomRecordingListResponse::class,
        );
    }

    /**
     * @api
     *
     * Synchronously delete a Room Recording.
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($roomRecordingID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $roomRecordingID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['room_recordings/%1$s', $roomRecordingID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete several room recordings in a bulk.
     *
     * @param Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs]
     * @param Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return RoomRecordingDeleteBulkResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteBulk(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RoomRecordingDeleteBulkResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->deleteBulkRaw($params, $requestOptions);
    }

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
    ): RoomRecordingDeleteBulkResponse {
        [$parsed, $options] = RoomRecordingDeleteBulkParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: 'room_recordings',
            query: $parsed,
            options: $options,
            convert: RoomRecordingDeleteBulkResponse::class,
        );
    }
}
