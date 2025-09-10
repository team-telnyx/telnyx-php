<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\Rooms\RoomCreateParams;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomListParams\Page;
use Telnyx\Rooms\RoomListResponse;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomRetrieveParams;
use Telnyx\Rooms\RoomUpdateParams;
use Telnyx\Rooms\RoomUpdateResponse;
use Telnyx\ServiceContracts\RoomsContract;
use Telnyx\Services\Rooms\ActionsService;
use Telnyx\Services\Rooms\SessionsService;

use const Telnyx\Core\OMIT as omit;

final class RoomsService implements RoomsContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @@api
     */
    public SessionsService $sessions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($this->client);
        $this->sessions = new SessionsService($this->client);
    }

    /**
     * @api
     *
     * Synchronously create a Room.
     *
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     */
    public function create(
        $enableRecording = omit,
        $maxParticipants = omit,
        $uniqueName = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomNewResponse {
        [$parsed, $options] = RoomCreateParams::parseRequest(
            [
                'enableRecording' => $enableRecording,
                'maxParticipants' => $maxParticipants,
                'uniqueName' => $uniqueName,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param bool $includeSessions to decide if room sessions should be included in the response
     */
    public function retrieve(
        string $roomID,
        $includeSessions = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomGetResponse {
        [$parsed, $options] = RoomRetrieveParams::parseRequest(
            ['includeSessions' => $includeSessions],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     */
    public function update(
        string $roomID,
        $enableRecording = omit,
        $maxParticipants = omit,
        $uniqueName = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomUpdateResponse {
        [$parsed, $options] = RoomUpdateParams::parseRequest(
            [
                'enableRecording' => $enableRecording,
                'maxParticipants' => $maxParticipants,
                'uniqueName' => $uniqueName,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name]
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $includeSessions = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomListResponse {
        [$parsed, $options] = RoomListParams::parseRequest(
            [
                'filter' => $filter,
                'includeSessions' => $includeSessions,
                'page' => $page,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     */
    public function delete(
        string $roomID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['rooms/%1$s', $roomID],
            options: $requestOptions,
            convert: null,
        );
    }
}
