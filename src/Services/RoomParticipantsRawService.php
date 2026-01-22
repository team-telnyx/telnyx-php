<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter;
use Telnyx\RoomParticipants\RoomParticipantListParams\Page;
use Telnyx\ServiceContracts\RoomParticipantsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\RoomParticipants\RoomParticipantListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomParticipants\RoomParticipantListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomParticipantGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|RoomParticipantListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<RoomParticipant>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: RoomParticipant::class,
            page: DefaultPagination::class,
        );
    }
}
