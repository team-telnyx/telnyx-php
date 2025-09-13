<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams\Filter;
use Telnyx\Rooms\RoomListParams\Page;
use Telnyx\Rooms\RoomListResponse;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @return RoomNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $enableRecording = omit,
        $maxParticipants = omit,
        $uniqueName = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RoomNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RoomNewResponse;

    /**
     * @api
     *
     * @param bool $includeSessions to decide if room sessions should be included in the response
     *
     * @return RoomGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        $includeSessions = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RoomGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RoomGetResponse;

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
     * @return RoomUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        $enableRecording = omit,
        $maxParticipants = omit,
        $uniqueName = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RoomUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $roomID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RoomUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name]
     * @param bool $includeSessions to decide if room sessions should be included in the response
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return RoomListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $includeSessions = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RoomListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RoomListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $roomID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
