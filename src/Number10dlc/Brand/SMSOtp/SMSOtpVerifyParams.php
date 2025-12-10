<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand\SMSOtp;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
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
 * @see Telnyx\Services\Number10dlc\Brand\SMSOtpService::verify()
 *
 * @phpstan-type SMSOtpVerifyParamsShape = array{otpPin: string}
 */
final class SMSOtpVerifyParams implements BaseModel
{
    /** @use SdkModel<SMSOtpVerifyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The OTP PIN received via SMS.
     */
    #[Required]
    public string $otpPin;

    /**
     * `new SMSOtpVerifyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SMSOtpVerifyParams::with(otpPin: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SMSOtpVerifyParams)->withOtpPin(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $otpPin): self
    {
        $self = new self;

        $self['otpPin'] = $otpPin;

        return $self;
    }

    /**
     * The OTP PIN received via SMS.
     */
    public function withOtpPin(string $otpPin): self
    {
        $self = clone $this;
        $self['otpPin'] = $otpPin;

        return $self;
    }
}
