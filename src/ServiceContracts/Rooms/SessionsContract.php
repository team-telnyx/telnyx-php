<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

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

interface SessionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SessionRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomSessionID,
        array|SessionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): SessionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|SessionList0Params $params
     *
     * @return DefaultPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|SessionList1Params $params
     *
     * @return DefaultPagination<RoomSession>
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|SessionRetrieveParticipantsParams $params
     *
     * @return DefaultPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
