<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\Rooms\Sessions\SessionList0Params\Page;
use Telnyx\ServiceContracts\Rooms\SessionsContract;
use Telnyx\Services\Rooms\Sessions\ActionsService;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionList0Params\Filter
 * @phpstan-import-type PageShape from \Telnyx\Rooms\Sessions\SessionList0Params\Page
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionList1Params\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\Rooms\Sessions\SessionList1Params\Page as PageShape1
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter as FilterShape2
 * @phpstan-import-type PageShape from \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Page as PageShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        ?bool $includeParticipants = null,
        RequestOptions|array|null $requestOptions = null,
    ): SessionGetResponse {
        $params = Util::removeNulls(
            ['includeParticipants' => $includeParticipants]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room sessions.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list0(
        Filter|array|null $filter = null,
        ?bool $includeParticipants = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'includeParticipants' => $includeParticipants,
                'page' => $page,
            ],
        );

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
     * @param \Telnyx\Rooms\Sessions\SessionList1Params\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param \Telnyx\Rooms\Sessions\SessionList1Params\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        \Telnyx\Rooms\Sessions\SessionList1Params\Filter|array|null $filter = null,
        ?bool $includeParticipants = null,
        \Telnyx\Rooms\Sessions\SessionList1Params\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'includeParticipants' => $includeParticipants,
                'page' => $page,
            ],
        );

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
     * @param \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter|FilterShape2 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context]
     * @param \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Page|PageShape2 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter|array|null $filter = null,
        \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveParticipants($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
