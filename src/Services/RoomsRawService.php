<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Room;
use Telnyx\Rooms\RoomCreateParams;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomRetrieveParams;
use Telnyx\Rooms\RoomUpdateParams;
use Telnyx\Rooms\RoomUpdateResponse;
use Telnyx\ServiceContracts\RoomsRawContract;

/**
 * Rooms operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\RoomListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RoomsRawService implements RoomsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Synchronously creates a new video room with the provided configuration and returns the created room.
     *
     * @param array{
     *   enableRecording?: bool,
     *   maxParticipants?: int,
     *   uniqueName?: string,
     *   webhookEventFailoverURL?: string,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int,
     * }|RoomCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RoomCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'rooms',
            body: (object) $parsed,
            options: $options,
            convert: RoomNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the room identified by `room_id`, including its participant limit, recording and webhook configuration, and active session identifier. Use `include_sessions` to include its sessions.
     *
     * @param string $roomID the unique identifier of a room
     * @param array{includeSessions?: bool}|RoomRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        array|RoomRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rooms/%1$s', $roomID],
            query: Util::array_transform_keys(
                $parsed,
                ['includeSessions' => 'include_sessions']
            ),
            options: $options,
            convert: RoomGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Synchronously updates the specified video room's configuration and returns the updated room.
     *
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   enableRecording?: bool,
     *   maxParticipants?: int,
     *   uniqueName?: string,
     *   webhookEventFailoverURL?: string,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int,
     * }|RoomUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        array|RoomUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['rooms/%1$s', $roomID],
            body: (object) $parsed,
            options: $options,
            convert: RoomUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of rooms. Filter the results by creation or update date and unique name, and use `include_sessions` to include each room’s sessions.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   includeSessions?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|RoomListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Room>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'rooms',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'includeSessions' => 'include_sessions',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: Room::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Synchronously delete a Room. Participants from that room will be kicked out, they won't be able to join that room anymore, and you won't be charged anymore for that room.
     *
     * @param string $roomID the unique identifier of a room
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['rooms/%1$s', $roomID],
            options: $requestOptions,
            convert: null,
        );
    }
}
