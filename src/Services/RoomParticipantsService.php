<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter;
use Telnyx\RoomParticipants\RoomParticipantListParams\Page;
use Telnyx\RoomParticipants\RoomParticipantListResponse;
use Telnyx\ServiceContracts\RoomParticipantsContract;

use const Telnyx\Core\OMIT as omit;

final class RoomParticipantsService implements RoomParticipantsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * View a room participant.
     *
     * @return RoomParticipantGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $roomParticipantID,
        ?RequestOptions $requestOptions = null
    ): RoomParticipantGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['room_participants/%1$s', $roomParticipantID],
            options: $requestOptions,
            convert: RoomParticipantGetResponse::class,
        );
    }

    /**
     * @api
     *
     * View a list of room participants.
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
    ): RoomParticipantListResponse {
        [$parsed, $options] = RoomParticipantListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'room_participants',
            query: $parsed,
            options: $options,
            convert: RoomParticipantListResponse::class,
        );
    }
}
