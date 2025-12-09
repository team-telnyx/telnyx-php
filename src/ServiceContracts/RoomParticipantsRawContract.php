<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;
use Telnyx\RoomParticipants\RoomParticipantListResponse;

interface RoomParticipantsRawContract
{
    /**
     * @api
     *
     * @param string $roomParticipantID the unique identifier of a room participant
     *
     * @return BaseResponse<RoomParticipantGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomParticipantListParams $params
     *
     * @return BaseResponse<RoomParticipantListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
