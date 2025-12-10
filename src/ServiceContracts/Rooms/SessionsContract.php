<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\SessionGetParticipantsResponse;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Response;
use Telnyx\Rooms\Sessions\SessionList1Response;

interface SessionsContract
{
    /**
     * @api
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
    ): SessionGetResponse;

    /**
     * @api
     *
     * @param array{
     *   active?: bool,
     *   dateCreatedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateEndedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateUpdatedAt?: array{eq?: string, gte?: string, lte?: string},
     *   roomID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list0(
        ?array $filter = null,
        ?bool $includeParticipants = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): SessionList0Response;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array{
     *   active?: bool,
     *   dateCreatedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateEndedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateUpdatedAt?: array{eq?: string, gte?: string, lte?: string},
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        ?array $filter = null,
        ?bool $includeParticipants = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): SessionList1Response;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array{
     *   context?: string,
     *   dateJoinedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateLeftAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateUpdatedAt?: array{eq?: string, gte?: string, lte?: string},
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): SessionGetParticipantsResponse;
}
