<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionRetrieveParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SessionsRawContract
{
    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<string,mixed>|SessionRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SessionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        array|SessionRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SessionList0Params $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<string,mixed>|SessionList1Params $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<string,mixed>|SessionRetrieveParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RoomParticipant>>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
