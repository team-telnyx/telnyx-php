<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\Rooms\RoomSession;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionRetrieveParams;
use Telnyx\Rooms\Sessions\SessionRetrieveParticipantsParams;

interface SessionsRawContract
{
    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<mixed>|SessionRetrieveParams $params
     *
     * @return BaseResponse<SessionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        array|SessionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|SessionList0Params $params
     *
     * @return BaseResponse<DefaultPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomID the unique identifier of a room
     * @param array<mixed>|SessionList1Params $params
     *
     * @return BaseResponse<DefaultPagination<RoomSession>>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $roomSessionID the unique identifier of a room session
     * @param array<mixed>|SessionRetrieveParticipantsParams $params
     *
     * @return BaseResponse<DefaultPagination<RoomParticipant>>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
