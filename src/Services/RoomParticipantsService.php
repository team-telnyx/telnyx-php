<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams\Filter;
use Telnyx\ServiceContracts\RoomParticipantsContract;

/**
 * Rooms Participants operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\RoomParticipants\RoomParticipantListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RoomParticipantsService implements RoomParticipantsContract
{
    /**
     * @api
     */
    public RoomParticipantsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RoomParticipantsRawService($client);
    }

    /**
     * @api
     *
     * View a room participant.
     *
     * @param string $roomParticipantID the unique identifier of a room participant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        RequestOptions|array|null $requestOptions = null
    ): RoomParticipantGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($roomParticipantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room participants.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_joined_at][eq], filter[date_joined_at][gte], filter[date_joined_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_left_at][eq], filter[date_left_at][gte], filter[date_left_at][lte], filter[context], filter[session_id]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
