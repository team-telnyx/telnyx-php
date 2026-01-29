<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkResponse;
use Telnyx\RoomRecordings\RoomRecordingGetResponse;
use Telnyx\RoomRecordings\RoomRecordingListParams;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListParams\Page;
use Telnyx\RoomRecordings\RoomRecordingListResponse;
use Telnyx\ServiceContracts\RoomRecordingsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomRecordingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|RoomRecordingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<RoomRecordingListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomRecordingListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Synchronously delete a Room Recording.
     *
     * @param string $roomRecordingID the unique identifier of a room recording
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomRecordingID,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: RoomRecordingDeleteBulkParams\Filter|FilterShape1,
     *   page?: RoomRecordingDeleteBulkParams\Page|PageShape1,
     * }|RoomRecordingDeleteBulkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomRecordingDeleteBulkResponse>
     *
     * @throws APIException
     */
    public function deleteBulk(
        array|RoomRecordingDeleteBulkParams $params,
        RequestOptions|array|null $requestOptions = null,
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
