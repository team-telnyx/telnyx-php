<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\SessionGetParticipantsResponse;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params\Filter;
use Telnyx\Rooms\Sessions\SessionList0Params\Page;
use Telnyx\Rooms\Sessions\SessionList0Response;
use Telnyx\Rooms\Sessions\SessionList1Response;

use const Telnyx\Core\OMIT as omit;

interface SessionsContract
{
    /**
     * @api
     *
     * @param bool $includeParticipants to decide if room participants should be included in the response
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        $includeParticipants = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SessionGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[room_id], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list0(
        $filter = omit,
        $includeParticipants = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionList0Response;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function list0Raw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SessionList0Response;

    /**
     * @api
     *
     * @param \Telnyx\Rooms\Sessions\SessionList1Params\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[active]
     * @param bool $includeParticipants to decide if room participants should be included in the response
     * @param \Telnyx\Rooms\Sessions\SessionList1Params\Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        $filter = omit,
        $includeParticipants = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionList1Response;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function list1Raw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SessionList1Response;

    /**
     * @api
     *
     * @param \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context]
     * @param \Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams\Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): SessionGetParticipantsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveParticipantsRaw(
        string $roomSessionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SessionGetParticipantsResponse;
}
