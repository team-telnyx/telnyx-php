<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsRawContract;

final class RoomRecordingsRawService implements RoomRecordingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * View a room recording.
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     *
     * @return BaseResponse<RoomRecordingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *     dateEndedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateStartedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     durationSecs?: int,
     *     participantID?: string,
     *     roomID?: string,
     *     sessionID?: string,
     *     status?: string,
     *     type?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomRecordingListParams $params
     *
     * @return BaseResponse<RoomRecordingListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RoomRecordingListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomRecordingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $roomRecordingID the unique identifier of a room recording
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *     dateEndedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateStartedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     durationSecs?: int,
     *     participantID?: string,
     *     roomID?: string,
     *     sessionID?: string,
     *     status?: string,
     *     type?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomRecordingDeleteBulkParams $params
     *
     * @return BaseResponse<RoomRecordingDeleteBulkResponse>
     *
     * @throws APIException
     */
    public function deleteBulk(
        array|RoomRecordingDeleteBulkParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomRecordingDeleteBulkParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'room_recordings',
            query: $parsed,
            options: $options,
            convert: RoomRecordingDeleteBulkResponse::class,
        );
    }
}
