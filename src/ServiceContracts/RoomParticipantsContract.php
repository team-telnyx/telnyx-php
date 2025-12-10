<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListResponse;

interface RoomParticipantsContract
{
    /**
     * @api
     *
     * @param string $roomParticipantID the unique identifier of a room participant
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        ?RequestOptions $requestOptions = null
    ): RoomParticipantGetResponse;

    /**
     * @api
     *
     * @param array{
     *   context?: string,
     *   dateJoinedAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateLeftAt?: array{eq?: string, gte?: string, lte?: string},
     *   dateUpdatedAt?: array{eq?: string, gte?: string, lte?: string},
     *   sessionID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): RoomParticipantListResponse;
}
