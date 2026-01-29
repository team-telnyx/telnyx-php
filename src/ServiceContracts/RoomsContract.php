<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Room;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Rooms\RoomListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomsContract
{
    /**
     * @api
     *
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        bool $enableRecording = false,
        int $maxParticipants = 10,
        ?string $uniqueName = null,
        string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomNewResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        ?bool $includeSessions = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomGetResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        bool $enableRecording = false,
        int $maxParticipants = 10,
        ?string $uniqueName = null,
        string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name]
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Room>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?bool $includeSessions = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
