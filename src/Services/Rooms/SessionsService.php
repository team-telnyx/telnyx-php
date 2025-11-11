<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @param array{include_participants?: bool}|SessionRetrieveParams $params
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s', $roomSessionID],
            query: $parsed,
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
     *     date_created_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_ended_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_updated_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     room_id?: string,
     *   },
     *   include_participants?: bool,
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'room_sessions',
            query: $parsed,
            options: $options,
            convert: SessionList0Response::class,
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
     *     date_created_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_ended_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_updated_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *   },
     *   include_participants?: bool,
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['rooms/%1$s/sessions', $roomID],
            query: $parsed,
            options: $options,
            convert: SessionList1Response::class,
        );
    }

    /**
     * @api
     *
     * View a list of room participants.
     *
     * @param array{
     *   filter?: array{
     *     context?: string,
     *     date_joined_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_left_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_updated_at?: array{
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['room_sessions/%1$s/participants', $roomSessionID],
            query: $parsed,
            options: $options,
            convert: SessionGetParticipantsResponse::class,
        );
    }
}
