<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;
use Telnyx\RoomParticipants\RoomParticipantListResponse;
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
        /** @var BaseResponse<RoomParticipantGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['room_participants/%1$s', $roomParticipantID],
            options: $requestOptions,
            convert: RoomParticipantGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room participants.
     *
     * @param array{
     *   filter?: array{
     *     context?: string,
     *     dateJoinedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateLeftAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     dateUpdatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     sessionID?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomParticipantListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomParticipantListResponse {
        [$parsed, $options] = RoomParticipantListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RoomParticipantListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'room_participants',
            query: $parsed,
            options: $options,
            convert: RoomParticipantListResponse::class,
        );

        return $response->parse();
    }
}
