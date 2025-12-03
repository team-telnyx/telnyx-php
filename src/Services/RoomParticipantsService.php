<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;
use Telnyx\ServiceContracts\RoomParticipantsContract;

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
     * @throws APIException
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
     * @param array{
     *   filter?: array{
     *     context?: string,
     *     date_joined_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_left_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     date_updated_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     session_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomParticipantListParams $params
     *
     * @return DefaultPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = RoomParticipantListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'room_participants',
            query: $parsed,
            options: $options,
            convert: RoomParticipant::class,
            page: DefaultPagination::class,
        );
    }
}
