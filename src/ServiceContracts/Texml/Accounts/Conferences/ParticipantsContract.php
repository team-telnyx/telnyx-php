<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Conferences;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantDeleteParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantRetrieveParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantRetrieveParticipantsParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateParams;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateResponse;

interface ParticipantsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ParticipantRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSidOrParticipantLabel,
        array|ParticipantRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ParticipantUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $callSidOrParticipantLabel,
        array|ParticipantUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ParticipantDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $callSidOrParticipantLabel,
        array|ParticipantDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|ParticipantParticipantsParams $params
     *
     * @throws APIException
     */
    public function participants(
        string $conferenceSid,
        array|ParticipantParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantParticipantsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ParticipantRetrieveParticipantsParams $params
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $conferenceSid,
        array|ParticipantRetrieveParticipantsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ParticipantGetParticipantsResponse;
}
