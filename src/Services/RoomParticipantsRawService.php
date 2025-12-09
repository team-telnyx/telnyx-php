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
use Telnyx\ServiceContracts\RoomParticipantsRawContract;

final class RoomParticipantsRawService implements RoomParticipantsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * View a room participant.
     *
     * @param string $roomParticipantID the unique identifier of a room participant
     *
     * @return BaseResponse<RoomParticipantGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<RoomParticipantListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RoomParticipantListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'room_participants',
            query: $parsed,
            options: $options,
            convert: RoomParticipantListResponse::class,
        );
    }
}
