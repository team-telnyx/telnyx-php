<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Room;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomUpdateResponse;

interface RoomsContract
{
    /**
     * @api
     *
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        bool $enableRecording = false,
        int $maxParticipants = 10,
        ?string $uniqueName = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): RoomNewResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param bool $includeSessions to decide if room sessions should be included in the response
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        ?bool $includeSessions = null,
        ?RequestOptions $requestOptions = null,
    ): RoomGetResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param bool $enableRecording enable or disable recording for that room
     * @param int $maxParticipants The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     * @param string $uniqueName the unique (within the Telnyx account scope) name of the room
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        bool $enableRecording = false,
        int $maxParticipants = 10,
        ?string $uniqueName = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): RoomUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   dateCreatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   dateUpdatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   uniqueName?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name]
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<Room>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?bool $includeSessions = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
