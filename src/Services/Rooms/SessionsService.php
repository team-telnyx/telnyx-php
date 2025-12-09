<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\ServiceContracts\Rooms\SessionsContract;
use Telnyx\Services\Rooms\Sessions\ActionsService;

final class SessionsService implements SessionsContract
{
    /**
     * @api
     */
    public SessionsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SessionsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * View a room session.
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param bool $includeParticipants to decide if room participants should be included in the response
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        ?bool $includeParticipants = null,
        ?RequestOptions $requestOptions = null,
    ): SessionGetResponse {
        $params = ['includeParticipants' => $includeParticipants];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room sessions.
     *
     * @param array{
     *   active?: bool,
     *   dateCreatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateEndedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateUpdatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   roomID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list0(
        ?array $filter = null,
        ?bool $includeParticipants = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = [
            'filter' => $filter,
            'includeParticipants' => $includeParticipants,
            'page' => $page,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list0(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room sessions.
     *
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   active?: bool,
     *   dateCreatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateEndedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateUpdatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        ?array $filter = null,
        ?bool $includeParticipants = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = [
            'filter' => $filter,
            'includeParticipants' => $includeParticipants,
            'page' => $page,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list1($roomID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room participants.
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   context?: string,
     *   dateJoinedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateLeftAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateUpdatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveParticipants($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
