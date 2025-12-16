<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignParams;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusParams;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams;
use Telnyx\RequestOptions;

interface PhoneNumberAssignmentByProfileRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberAssignmentByProfileAssignParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileAssignResponse>
     *
     * @throws APIException
     */
    public function assign(
        array|PhoneNumberAssignmentByProfileAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberAssignmentByProfileListPhoneNumberStatusParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse,>
     *
     * @throws APIException
     */
    public function listPhoneNumberStatus(
        string $taskID,
        array|PhoneNumberAssignmentByProfileListPhoneNumberStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse>
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        array|PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
