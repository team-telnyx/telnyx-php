<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionRetrieveParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;
use Telnyx\ServiceContracts\Rooms\SessionsRawContract;

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
     * View a room session.
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{includeParticipants?: bool}|SessionRetrieveParams $params
     *
     * @return BaseResponse<SessionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        array|SessionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
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
     * View a list of room sessions.
     *
     * @param array{
     *   filter?: array{
     *     active?: bool,
     *     dateCreatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateEndedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateUpdatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     roomID?: string,
     *   },
     *   includeParticipants?: bool,
     *   page?: array{number?: int, size?: int},
     * }|SessionList0Params $params
     *
     * @return BaseResponse<DefaultPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        ?RequestOptions $requestOptions = null
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
                ['includeParticipants' => 'include_participants']
            ),
            options: $options,
            convert: RoomSession::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * View a list of room sessions.
     *
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   filter?: array{
     *     active?: bool,
     *     dateCreatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateEndedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateUpdatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *   },
     *   includeParticipants?: bool,
     *   page?: array{number?: int, size?: int},
     * }|SessionList1Params $params
     *
     * @return BaseResponse<DefaultPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        ?RequestOptions $requestOptions = null,
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
                ['includeParticipants' => 'include_participants']
            ),
            options: $options,
            convert: RoomSession::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * View a list of room participants.
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   filter?: array{
     *     context?: string,
     *     dateJoinedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateLeftAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateUpdatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|SessionRetrieveParticipantsParams $params
     *
     * @return BaseResponse<DefaultPagination<RoomParticipant>>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SessionRetrieveParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s/participants', $roomSessionID],
            query: $parsed,
            options: $options,
            convert: RoomParticipant::class,
            page: DefaultPagination::class,
        );
    }
}
