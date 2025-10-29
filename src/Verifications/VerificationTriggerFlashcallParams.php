<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Trigger Flash call verification.
 *
 * @see Telnyx\Verifications->triggerFlashcall
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
    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Api('verify_profile_id')]
    public string $verifyProfileID;

    /**
     * The number of seconds the verification code is valid for.
     */
    #[Api('timeout_secs', optional: true)]
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
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;
        $obj->verifyProfileID = $verifyProfileID;

        null !== $timeoutSecs && $obj->timeoutSecs = $timeoutSecs;

        return $obj;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj->verifyProfileID = $verifyProfileID;

        return $obj;
    }

    /**
     * The number of seconds the verification code is valid for.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeoutSecs = $timeoutSecs;

        return $obj;
    }
}
