<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomParticipant;
use Telnyx\RoomParticipants\RoomParticipantGetResponse;
use Telnyx\RoomParticipants\RoomParticipantListParams;

interface RoomParticipantsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomParticipantID,
        ?RequestOptions $requestOptions = null
    ): RoomParticipantGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RoomParticipantListParams $params
     *
     * @return DefaultPagination<RoomParticipant>
     *
     * @throws APIException
     */
    public function list(
        array|RoomParticipantListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
