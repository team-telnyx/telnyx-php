<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignParams;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusParams;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetTaskStatusResponse;
use Telnyx\RequestOptions;

interface PhoneNumberAssignmentByProfileRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberAssignmentByProfileAssignParams $params
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
     * @param array<mixed>|PhoneNumberAssignmentByProfileGetPhoneNumberStatusParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse>
     *
     * @throws APIException
     */
    public function getPhoneNumberStatus(
        string $taskID,
        array|PhoneNumberAssignmentByProfileGetPhoneNumberStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetTaskStatusResponse>
     *
     * @throws APIException
     */
    public function getTaskStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
