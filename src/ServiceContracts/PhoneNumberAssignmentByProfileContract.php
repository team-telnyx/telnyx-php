<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignParams;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams;
use Telnyx\RequestOptions;

interface PhoneNumberAssignmentByProfileContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberAssignmentByProfileAssignParams $params
     *
     * @throws APIException
     */
    public function assign(
        array|PhoneNumberAssignmentByProfileAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileAssignResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams $params
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        array|PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse;
}
