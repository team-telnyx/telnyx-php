<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter;
use Telnyx\RoomParticipants\RoomParticipantListParams\Page;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RoomParticipants\RoomParticipantListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomParticipants\RoomParticipantListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomParticipantsContract
{
    /**
     * @api
     *
     * @param string $roomParticipantID the unique identifier of a room participant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        RequestOptions|array|null $requestOptions = null,
    ): RoomParticipantGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
