<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\RoomCreateParams;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams;
use Telnyx\Rooms\RoomListResponse;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomRetrieveParams;
use Telnyx\Rooms\RoomUpdateParams;
use Telnyx\Rooms\RoomUpdateResponse;

interface RoomsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RoomCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RoomCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): RoomNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        array|RoomRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        array|RoomUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomListParams $params,
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
}
