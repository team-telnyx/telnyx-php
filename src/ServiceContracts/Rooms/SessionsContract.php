<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Rooms;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Rooms\Sessions\SessionGetParticipantsResponse;
use Telnyx\Rooms\Sessions\SessionGetResponse;
use Telnyx\Rooms\Sessions\SessionList0Params;
use Telnyx\Rooms\Sessions\SessionList0Response;
use Telnyx\Rooms\Sessions\SessionList1Params;
use Telnyx\Rooms\Sessions\SessionList1Response;
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
     * @throws APIException
     */
    public function list0(
        array|SessionList0Params $params,
        ?RequestOptions $requestOptions = null
    ): SessionList0Response;

    /**
     * @api
     *
     * @param array<mixed>|SessionList1Params $params
     *
     * @throws APIException
     */
    public function list1(
        string $roomID,
        array|SessionList1Params $params,
        ?RequestOptions $requestOptions = null,
    ): SessionList1Response;

    /**
     * @api
     *
     * @param array<mixed>|SessionRetrieveParticipantsParams $params
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $roomSessionID,
        array|SessionRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): SessionGetParticipantsResponse;
}
