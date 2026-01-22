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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RoomCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|RoomCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<string,mixed>|RoomRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomID,
        array|RoomRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<string,mixed>|RoomUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RoomUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $roomID,
        array|RoomUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RoomListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<Room>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $roomID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
