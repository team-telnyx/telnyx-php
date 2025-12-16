<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;

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
     * @param array<string,mixed>|RoomParticipantListParams $params
     *
     * @return BaseResponse<DefaultPagination<RoomParticipant>>
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
