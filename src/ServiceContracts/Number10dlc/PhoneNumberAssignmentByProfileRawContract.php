<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumbersResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams;
use Telnyx\RequestOptions;

interface PhoneNumberAssignmentByProfileRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse,>
     *
     * @throws APIException
     */
    public function phoneNumberAssignmentByProfile(
        array|PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function retrievePhoneNumbers(
        string $taskID,
        array|PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
