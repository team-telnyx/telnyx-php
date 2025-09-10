<?php

declare(strict_types=1);

namespace Telnyx\Services\Rooms;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\SessionGetParticipantsResponse;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\Rooms\Sessions\SessionList0Params\Page;
use Telnyx\Rooms\Sessions\SessionList0Response;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionList1Params\Filter as Filter1;
use Telnyx\Rooms\Sessions\SessionList1Params\Page as Page1;
use Telnyx\Rooms\Sessions\SessionList1Response;
use Telnyx\Rooms\Sessions\SessionRetrieveParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter as Filter2;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Page as Page2;
use Telnyx\ServiceContracts\Rooms\SessionsContract;
use Telnyx\Services\Rooms\Sessions\ActionsService;

use const Telnyx\Core\OMIT as omit;

final class SessionsService implements SessionsContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($this->client);
    }

    /**
     * @api
     *
     * View a room session.
     *
     * @param bool $includeParticipants to decide if room participants should be included in the response
     */
    public function retrieve(
        string $roomSessionID,
        $includeParticipants = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionGetResponse {
        [$parsed, $options] = SessionRetrieveParams::parseRequest(
            ['includeParticipants' => $includeParticipants],
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list0(
        $filter = omit,
        $includeParticipants = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionList0Response {
        [$parsed, $options] = SessionList0Params::parseRequest(
            [
                'filter' => $filter,
                'includeParticipants' => $includeParticipants,
                'page' => $page,
            ],
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
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param Page1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list1(
        string $roomID,
        $filter = omit,
        $includeParticipants = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionList1Response {
        [$parsed, $options] = SessionList1Params::parseRequest(
            [
                'filter' => $filter,
                'includeParticipants' => $includeParticipants,
                'page' => $page,
            ],
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
     * @param Filter2 $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context]
     * @param Page2 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function retrieveParticipants(
        string $roomSessionID,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionGetParticipantsResponse {
        [$parsed, $options] = SessionRetrieveParticipantsParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
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
