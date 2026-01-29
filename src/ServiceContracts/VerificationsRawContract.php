<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;
use Telnyx\Verifications\VerificationTriggerCallParams;
use Telnyx\Verifications\VerificationTriggerFlashcallParams;
use Telnyx\Verifications\VerificationTriggerSMSParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerificationsRawContract
{
    /**
     * @api
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $verificationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerificationTriggerCallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerCall(
        array|VerificationTriggerCallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerificationTriggerFlashcallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        array|VerificationTriggerFlashcallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerificationTriggerSMSParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerSMS(
        array|VerificationTriggerSMSParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
