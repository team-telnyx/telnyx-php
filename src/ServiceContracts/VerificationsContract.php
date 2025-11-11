<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;
use Telnyx\Verifications\VerificationTriggerCallParams;
use Telnyx\Verifications\VerificationTriggerFlashcallParams;
use Telnyx\Verifications\VerificationTriggerSMSParams;

interface VerificationsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $verificationID,
        ?RequestOptions $requestOptions = null
    ): VerificationGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerificationTriggerCallParams $params
     *
     * @throws APIException
     */
    public function triggerCall(
        array|VerificationTriggerCallParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerificationTriggerFlashcallParams $params
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        array|VerificationTriggerFlashcallParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerificationTriggerSMSParams $params
     *
     * @throws APIException
     */
    public function triggerSMS(
        array|VerificationTriggerSMSParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse;
}
