<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Conferences;

use Telnyx\Core\Contracts\BaseResponse;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ParticipantsRawContract
{
    /**
     * @api
     *
     * @param string $callSidOrParticipantLabel callSid or Label of the Participant to update
     * @param array<string,mixed>|ParticipantRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callSidOrParticipantLabel,
        array|ParticipantRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callSidOrParticipantLabel path param: CallSid or Label of the Participant to update
     * @param array<string,mixed>|ParticipantUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $callSidOrParticipantLabel,
        array|ParticipantUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $callSidOrParticipantLabel callSid or Label of the Participant to update
     * @param array<string,mixed>|ParticipantDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $callSidOrParticipantLabel,
        array|ParticipantDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conferenceSid path param: The ConferenceSid that uniquely identifies a conference
     * @param array<string,mixed>|ParticipantParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantParticipantsResponse>
     *
     * @throws APIException
     */
    public function participants(
        string $conferenceSid,
        array|ParticipantParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conferenceSid the ConferenceSid that uniquely identifies a conference
     * @param array<string,mixed>|ParticipantRetrieveParticipantsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ParticipantGetParticipantsResponse>
     *
     * @throws APIException
     */
    public function retrieveParticipants(
        string $conferenceSid,
        array|ParticipantRetrieveParticipantsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
