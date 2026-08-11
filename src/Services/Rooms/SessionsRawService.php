<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionRetrieveParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;
use Telnyx\ServiceContracts\Rooms\SessionsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionList0Params\Filter
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionList1Params\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SessionsRawService implements SessionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the room session identified by `room_session_id`, including its room, active status, and lifecycle timestamps. Use `include_participants` to include its participant records.
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{includeParticipants?: bool}|SessionRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SessionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        array|SessionRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SessionRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s', $roomSessionID],
            query: Util::array_transform_keys(
                $parsed,
                ['includeParticipants' => 'include_participants']
            ),
            options: $options,
            convert: SessionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of room sessions across the account. Filter sessions by room, creation, update, or end date and active status, and use `include_participants` to include participant records.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   includeParticipants?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|SessionList0Params $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SessionList0Params::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'room_sessions',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'includeParticipants' => 'include_participants',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: RoomSession::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of sessions for the specified room. Filter sessions by creation, update, or end date and active status, and use `include_participants` to include participant records.
     *
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   filter?: SessionList1Params\Filter|FilterShape1,
     *   includeParticipants?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|SessionList1Params $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SessionList1Params::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rooms/%1$s/sessions', $roomID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'includeParticipants' => 'include_participants',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: RoomSession::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of participants for the specified room session. Filter participants by join, update, or leave date and by participant context.
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   filter?: SessionRetrieveParticipantsParams\Filter|FilterShape2,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|SessionRetrieveParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomParticipant>>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SessionRetrieveParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s/participants', $roomSessionID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: RoomParticipant::class,
            page: DefaultFlatPagination::class,
        );
    }
}
