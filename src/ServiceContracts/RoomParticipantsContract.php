<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter;
use Telnyx\RoomParticipants\RoomParticipantListParams\Page;
use Telnyx\RoomParticipants\RoomParticipantListResponse;

use const Telnyx\Core\OMIT as omit;

interface RoomParticipantsContract
{
    /**
     * @api
     *
     * @return RoomParticipantGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $roomParticipantID,
        ?RequestOptions $requestOptions = null
    ): RoomParticipantGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return RoomParticipantListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RoomParticipantListResponse;
}
