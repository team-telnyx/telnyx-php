<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
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
 * @see Telnyx\Services\Messaging10dlc\BrandService::triggerSMSOtp()
 *
 * @phpstan-type BrandTriggerSMSOtpParamsShape = array{
 *   pinSMS: string, successSMS: string
 * }
 */
final class BrandTriggerSMSOtpParams implements BaseModel
{
    /** @use SdkModel<BrandTriggerSMSOtpParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * SMS message template to send the OTP. Must include `@OTP_PIN@` placeholder which will be replaced with the actual PIN.
     */
    #[Required('pinSms')]
    public string $pinSMS;

    /**
     * SMS message to send upon successful OTP verification.
     */
    #[Required('successSms')]
    public string $successSMS;

    /**
     * `new BrandTriggerSMSOtpParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandTriggerSMSOtpParams::with(pinSMS: ..., successSMS: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandTriggerSMSOtpParams)->withPinSMS(...)->withSuccessSMS(...)
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
    public static function with(string $pinSMS, string $successSMS): self
    {
        $self = new self;

        $self['pinSMS'] = $pinSMS;
        $self['successSMS'] = $successSMS;

        return $self;
    }

    /**
     * SMS message template to send the OTP. Must include `@OTP_PIN@` placeholder which will be replaced with the actual PIN.
     */
    public function withPinSMS(string $pinSMS): self
    {
        $self = clone $this;
        $self['pinSMS'] = $pinSMS;

        return $self;
    }

    /**
     * SMS message to send upon successful OTP verification.
     */
    public function withSuccessSMS(string $successSMS): self
    {
        $self = clone $this;
        $self['successSMS'] = $successSMS;

        return $self;
    }
}
