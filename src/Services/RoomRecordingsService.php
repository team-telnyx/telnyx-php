<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsContract;

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
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
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
     * @param array{
     *   filter?: array{
     *     date_ended_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_started_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     duration_secs?: int,
     *     participant_id?: string,
     *     room_id?: string,
     *     session_id?: string,
     *     status?: string,
     *     type?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomRecordingListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomRecordingListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingListResponse {
        [$parsed, $options] = RoomRecordingListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{
     *     date_ended_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_started_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     duration_secs?: int,
     *     participant_id?: string,
     *     room_id?: string,
     *     session_id?: string,
     *     status?: string,
     *     type?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomRecordingDeleteBulkParams $params
     *
     * @throws APIException
     */
    public function deleteBulk(
        array|RoomRecordingDeleteBulkParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomRecordingDeleteBulkResponse {
        [$parsed, $options] = RoomRecordingDeleteBulkParams::parseRequest(
            $params,
            $requestOptions,
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
