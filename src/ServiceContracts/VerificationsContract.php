<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;

use const Telnyx\Core\OMIT as omit;

interface VerificationsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $verificationID,
        ?RequestOptions $requestOptions = null
    ): VerificationGetResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param string|null $customCode Send a self-generated numeric code to the end-user
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     */
    public function triggerCall(
        $phoneNumber,
        $verifyProfileID,
        $customCode = omit,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     */
    public function triggerFlashcall(
        $phoneNumber,
        $verifyProfileID,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param string|null $customCode Send a self-generated numeric code to the end-user
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     */
    public function triggerSMS(
        $phoneNumber,
        $verifyProfileID,
        $customCode = omit,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse;
}
