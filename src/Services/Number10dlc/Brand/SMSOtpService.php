<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Brand;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Brand\SMSOtpContract;

final class SMSOtpService implements SMSOtpContract
{
    /**
     * @api
     */
    public SMSOtpRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SMSOtpRawService($client);
    }

    /**
     * @api
     *
     * Query the status of an SMS OTP (One-Time Password) for Sole Proprietor brand verification.
     *
     * This endpoint allows you to check the delivery and verification status of an OTP sent during the Sole Proprietor brand verification process. You can query by either:
     *
     * * `referenceId` - The reference ID returned when the OTP was initially triggered
     * * `brandId` - Query parameter for portal users to look up OTP status by Brand ID
     *
     * The response includes delivery status, verification dates, and detailed delivery information.
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
    ): SMSOtpGetStatusResponse {
        $params = Util::removeNulls(['brandID' => $brandID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatus($referenceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger or re-trigger an SMS OTP (One-Time Password) for Sole Proprietor brand verification.
     *
     * **Important Notes:**
     *
     * * Only allowed for Sole Proprietor (`SOLE_PROPRIETOR`) brands
     * * Triggers generation of a one-time password sent to the `mobilePhone` number in the brand's profile
     * * Campaigns cannot be created until OTP verification is complete
     * * US/CA numbers only for real OTPs; mock brands can use non-US/CA numbers for testing
     * * Returns a `referenceId` that can be used to check OTP status via the GET `/10dlc/brand/smsOtp/{referenceId}` endpoint
     *
     * **Use Cases:**
     *
     * * Initial OTP trigger after Sole Proprietor brand creation
     * * Re-triggering OTP if the user didn't receive or needs a new code
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
    ): SMSOtpTriggerResponse {
        $params = Util::removeNulls(
            ['pinSMS' => $pinSMS, 'successSMS' => $successSMS]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->trigger($brandID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Verify the SMS OTP (One-Time Password) for Sole Proprietor brand verification.
     *
     * **Verification Flow:**
     *
     * 1. User receives OTP via SMS after triggering
     * 2. User submits the OTP pin through this endpoint
     * 3. Upon successful verification:
     *    - A `BRAND_OTP_VERIFIED` webhook event is sent to the CSP
     *    - The brand's `identityStatus` changes to `VERIFIED`
     *    - Campaigns can now be created for this brand
     *
     * **Error Handling:**
     *
     * Provides proper error responses for:
     * * Invalid OTP pins
     * * Expired OTPs
     * * OTP verification failures
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
    ): mixed {
        $params = Util::removeNulls(['otpPin' => $otpPin]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->verify($brandID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
