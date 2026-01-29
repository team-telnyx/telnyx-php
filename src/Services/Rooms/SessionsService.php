<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\ServiceContracts\Rooms\SessionsContract;
use Telnyx\Services\Rooms\Sessions\ActionsService;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionList0Params\Filter
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionList1Params\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter as FilterShape2
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list0(
        Filter|array|null $filter = null,
        ?bool $includeParticipants = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'includeParticipants' => $includeParticipants,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        \Telnyx\Rooms\Sessions\SessionList1Params\Filter|array|null $filter = null,
        ?bool $includeParticipants = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'includeParticipants' => $includeParticipants,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveParticipants($roomSessionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
