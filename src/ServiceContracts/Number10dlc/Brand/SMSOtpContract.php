<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc\Brand;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerResponse;
use Telnyx\RequestOptions;

interface SMSOtpContract
{
    /**
     * @api
     *
     * @param string $referenceID The reference ID returned when the OTP was initially triggered
     * @param string $brandID Filter by Brand ID for easier lookup in portal applications
     *
     * @throws APIException
     */
    public function getStatus(
        string $referenceID,
        ?string $brandID = null,
        ?RequestOptions $requestOptions = null,
    ): SMSOtpGetStatusResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to trigger the OTP
     * @param string $pinSMS SMS message template to send the OTP. Must include `@OTP_PIN@` placeholder which will be replaced with the actual PIN
     * @param string $successSMS SMS message to send upon successful OTP verification
     *
     * @throws APIException
     */
    public function trigger(
        string $brandID,
        string $pinSMS,
        string $successSMS,
        ?RequestOptions $requestOptions = null,
    ): SMSOtpTriggerResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to verify the OTP
     * @param string $otpPin The OTP PIN received via SMS
     *
     * @throws APIException
     */
    public function verify(
        string $brandID,
        string $otpPin,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
