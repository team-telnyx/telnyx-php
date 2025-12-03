<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\RoomCreateParams;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams;
use Telnyx\Rooms\RoomListResponse;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomRetrieveParams;
use Telnyx\Rooms\RoomUpdateParams;
use Telnyx\Rooms\RoomUpdateResponse;
use Telnyx\ServiceContracts\RoomsContract;
use Telnyx\Services\Rooms\ActionsService;
use Telnyx\Services\Rooms\SessionsService;

final class RoomsService implements RoomsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public SessionsService $sessions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
        $this->sessions = new SessionsService($client);
    }

    /**
     * @api
     *
     * Synchronously create a Room.
     *
     * @param array{
     *   enable_recording?: bool,
     *   max_participants?: int,
     *   unique_name?: string,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|RoomCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RoomCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): RoomNewResponse {
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
     * View a room.
     *
     * @param array{include_sessions?: bool}|RoomRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        array|RoomRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomGetResponse {
        [$parsed, $options] = RoomRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['rooms/%1$s', $roomID],
            query: $parsed,
            options: $options,
            convert: RoomGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Synchronously update a Room.
     *
     * @param array{
     *   enable_recording?: bool,
     *   max_participants?: int,
     *   unique_name?: string,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
     * }|RoomUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        array|RoomUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomUpdateResponse {
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
     * View a list of rooms.
     *
     * @param array{
     *   filter?: array{
     *     date_created_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_updated_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     unique_name?: string,
     *   },
     *   include_sessions?: bool,
     *   page?: array{number?: int, size?: int},
     * }|RoomListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomListParams $params,
        ?RequestOptions $requestOptions = null
    ): RoomListResponse {
        [$parsed, $options] = RoomListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'rooms',
            query: $parsed,
            options: $options,
            convert: RoomListResponse::class,
        );
    }

    /**
     * @api
     *
     * Synchronously delete a Room. Participants from that room will be kicked out, they won't be able to join that room anymore, and you won't be charged anymore for that room.
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['rooms/%1$s', $roomID],
            options: $requestOptions,
            convert: null,
        );
    }
}
