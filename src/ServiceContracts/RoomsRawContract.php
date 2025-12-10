<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Room;
use Telnyx\Rooms\RoomCreateParams;
use Telnyx\Rooms\RoomGetResponse;
use Telnyx\Rooms\RoomListParams;
use Telnyx\Rooms\RoomNewResponse;
use Telnyx\Rooms\RoomRetrieveParams;
use Telnyx\Rooms\RoomUpdateParams;
use Telnyx\Rooms\RoomUpdateResponse;

interface RoomsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|RoomCreateParams $params
     *
     * @return BaseResponse<RoomNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RoomCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<mixed>|RoomRetrieveParams $params
     *
     * @return BaseResponse<RoomGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        array|RoomRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<mixed>|RoomUpdateParams $params
     *
     * @return BaseResponse<RoomUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        array|RoomUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomListParams $params
     *
     * @return BaseResponse<DefaultPagination<Room>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
