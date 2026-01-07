<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerificationsContract
{
    /**
     * @api
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $verificationID,
        RequestOptions|array|null $requestOptions = null
    ): VerificationGetResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param string|null $customCode Send a self-generated numeric code to the end-user
     * @param string|null $extension Optional extension to dial after call is answered using DTMF digits. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerCall(
        string $phoneNumber,
        string $verifyProfileID,
        ?string $customCode = null,
        ?string $extension = null,
        ?int $timeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreateVerificationResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        string $phoneNumber,
        string $verifyProfileID,
        ?int $timeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreateVerificationResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param string|null $customCode Send a self-generated numeric code to the end-user
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerSMS(
        string $phoneNumber,
        string $verifyProfileID,
        ?string $customCode = null,
        ?int $timeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreateVerificationResponse;
}
