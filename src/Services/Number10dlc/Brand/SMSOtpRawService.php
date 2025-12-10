<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Brand;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusParams;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerParams;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpVerifyParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Brand\SMSOtpRawContract;

final class SMSOtpRawService implements SMSOtpRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{brandID?: string}|SMSOtpGetStatusParams $params
     *
     * @return BaseResponse<SMSOtpGetStatusResponse>
     *
     * @throws APIException
     */
    public function getStatus(
        string $referenceID,
        array|SMSOtpGetStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SMSOtpGetStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/brand/smsOtp/%1$s', $referenceID],
            query: Util::array_transform_keys($parsed, ['brandID' => 'brandId']),
            options: $options,
            convert: SMSOtpGetStatusResponse::class,
        );
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
     * @param array{pinSMS: string, successSMS: string}|SMSOtpTriggerParams $params
     *
     * @return BaseResponse<SMSOtpTriggerResponse>
     *
     * @throws APIException
     */
    public function trigger(
        string $brandID,
        array|SMSOtpTriggerParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SMSOtpTriggerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/brand/%1$s/smsOtp', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: SMSOtpTriggerResponse::class,
        );
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
     * @param array{otpPin: string}|SMSOtpVerifyParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verify(
        string $brandID,
        array|SMSOtpVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SMSOtpVerifyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/brand/%1$s/smsOtp', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
