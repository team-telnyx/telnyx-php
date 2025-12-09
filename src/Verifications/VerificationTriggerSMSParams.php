<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Trigger SMS verification.
 *
 * @see Telnyx\Services\VerificationsService::triggerSMS()
 *
 * @phpstan-type VerificationTriggerSMSParamsShape = array{
 *   phoneNumber: string,
 *   verifyProfileID: string,
 *   customCode?: string|null,
 *   timeoutSecs?: int,
 * }
 */
final class VerificationTriggerSMSParams implements BaseModel
{
    /** @use SdkModel<VerificationTriggerSMSParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * +E164 formatted phone number.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Required('verify_profile_id')]
    public string $verifyProfileID;

    /**
     * Send a self-generated numeric code to the end-user.
     */
    #[Optional('custom_code', nullable: true)]
    public ?string $customCode;

    /**
     * The number of seconds the verification code is valid for.
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

    /**
     * `new VerificationTriggerSMSParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationTriggerSMSParams::with(phoneNumber: ..., verifyProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationTriggerSMSParams)
     *   ->withPhoneNumber(...)
     *   ->withVerifyProfileID(...)
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
    public static function with(
        string $phoneNumber,
        string $verifyProfileID,
        ?string $customCode = null,
        ?int $timeoutSecs = null,
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;
        $self['verifyProfileID'] = $verifyProfileID;

        null !== $customCode && $self['customCode'] = $customCode;
        null !== $timeoutSecs && $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $self = clone $this;
        $self['verifyProfileID'] = $verifyProfileID;

        return $self;
    }

    /**
     * Send a self-generated numeric code to the end-user.
     */
    public function withCustomCode(?string $customCode): self
    {
        $self = clone $this;
        $self['customCode'] = $customCode;

        return $self;
    }

    /**
     * The number of seconds the verification code is valid for.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }
}
