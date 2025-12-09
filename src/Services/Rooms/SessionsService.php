<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\SessionGetParticipantsResponse;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList0Response;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionList1Response;
use Telnyx\Rooms\Sessions\SessionRetrieveParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;
use Telnyx\ServiceContracts\Rooms\SessionsContract;
use Telnyx\Services\Rooms\Sessions\ActionsService;

final class SessionsService implements SessionsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * View a room session.
     *
     * @param array{includeParticipants?: bool}|SessionRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        array|SessionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SessionGetResponse {
        [$parsed, $options] = SessionRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SessionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s', $roomSessionID],
            query: Util::array_transform_keys(
                $parsed,
                ['includeParticipants' => 'include_participants']
            ),
            options: $options,
            convert: SessionGetResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        ?RequestOptions $requestOptions = null
    ): SessionList0Response {
        [$parsed, $options] = SessionList0Params::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SessionList0Response> */
        $response = $this->client->request(
            method: 'get',
            path: 'room_sessions',
            query: Util::array_transform_keys(
                $parsed,
                ['includeParticipants' => 'include_participants']
            ),
            options: $options,
            convert: SessionList0Response::class,
        );

        return $response->parse();
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
     *   },
     *   includeParticipants?: bool,
     *   page?: array{number?: int, size?: int},
     * }|SessionList1Params $params
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        ?RequestOptions $requestOptions = null,
    ): SessionList1Response {
        [$parsed, $options] = SessionList1Params::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SessionList1Response> */
        $response = $this->client->request(
            method: 'get',
            path: ['rooms/%1$s/sessions', $roomID],
            query: Util::array_transform_keys(
                $parsed,
                ['includeParticipants' => 'include_participants']
            ),
            options: $options,
            convert: SessionList1Response::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room participants.
     *
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
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): SessionGetParticipantsResponse {
        [$parsed, $options] = SessionRetrieveParticipantsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SessionGetParticipantsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s/participants', $roomSessionID],
            query: $parsed,
            options: $options,
            convert: SessionGetParticipantsResponse::class,
        );

        return $response->parse();
    }
}
