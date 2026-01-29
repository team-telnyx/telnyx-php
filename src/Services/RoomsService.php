<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Room;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomListParams\Page;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomUpdateResponse;
use Telnyx\ServiceContracts\RoomsContract;
use Telnyx\Services\Rooms\ActionsService;
use Telnyx\Services\Rooms\SessionsService;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\RoomListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Rooms\RoomListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RoomsService implements RoomsContract
{
    /**
     * @api
     */
    public RoomsRawService $raw;

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
        $this->raw = new RoomsRawService($client);
        $this->actions = new ActionsService($client);
        $this->sessions = new SessionsService($client);
    }

    /**
     * @api
     *
     * Synchronously create a Room.
     *
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        bool $enableRecording = false,
        int $maxParticipants = 10,
        ?string $uniqueName = null,
        string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomNewResponse {
        $params = Util::removeNulls(
            [
                'enableRecording' => $enableRecording,
                'maxParticipants' => $maxParticipants,
                'uniqueName' => $uniqueName,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a room.
     *
     * @param string $roomID the unique identifier of a room
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        ?bool $includeSessions = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomGetResponse {
        $params = Util::removeNulls(['includeSessions' => $includeSessions]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($roomID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Synchronously update a Room.
     *
     * @param string $roomID the unique identifier of a room
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        bool $enableRecording = false,
        int $maxParticipants = 10,
        ?string $uniqueName = null,
        string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomUpdateResponse {
        $params = Util::removeNulls(
            [
                'enableRecording' => $enableRecording,
                'maxParticipants' => $maxParticipants,
                'uniqueName' => $uniqueName,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($roomID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of rooms.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name]
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<Room>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?bool $includeSessions = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'includeSessions' => $includeSessions,
                'page' => $page,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Synchronously delete a Room. Participants from that room will be kicked out, they won't be able to join that room anymore, and you won't be charged anymore for that room.
     *
     * @param string $roomID the unique identifier of a room
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($roomID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
