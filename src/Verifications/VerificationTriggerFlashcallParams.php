<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Trigger Flash call verification.
 *
 * @see Telnyx\Services\VerificationsService::triggerFlashcall()
 *
 * @phpstan-type VerificationTriggerFlashcallParamsShape = array{
 *   phoneNumber: string, verifyProfileID: string, timeoutSecs?: int
 * }
 */
final class VerificationTriggerFlashcallParams implements BaseModel
{
    /** @use SdkModel<VerificationTriggerFlashcallParamsShape> */
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
     * The number of seconds the verification code is valid for.
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

    /**
     * `new VerificationTriggerFlashcallParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationTriggerFlashcallParams::with(phoneNumber: ..., verifyProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationTriggerFlashcallParams)
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
        ?int $timeoutSecs = null
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;
        $self['verifyProfileID'] = $verifyProfileID;

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
     * The number of seconds the verification code is valid for.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }
}
