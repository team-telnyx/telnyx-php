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
 * @see Telnyx\VerificationsService::triggerFlashcall()
 *
 * @phpstan-type VerificationTriggerFlashcallParamsShape = array{
 *   phone_number: string, verify_profile_id: string, timeout_secs?: int
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
    #[Api]
    public string $phone_number;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Api]
    public string $verify_profile_id;

    /**
     * The number of seconds the verification code is valid for.
     */
    #[Api(optional: true)]
    public ?int $timeout_secs;

    /**
     * `new VerificationTriggerFlashcallParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationTriggerFlashcallParams::with(
     *   phone_number: ..., verify_profile_id: ...
     * )
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
        string $phone_number,
        string $verify_profile_id,
        ?int $timeout_secs = null
    ): self {
        $obj = new self;

        $obj->phone_number = $phone_number;
        $obj->verify_profile_id = $verify_profile_id;

        null !== $timeout_secs && $obj->timeout_secs = $timeout_secs;

        return $obj;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj->verify_profile_id = $verifyProfileID;

        return $obj;
    }

    /**
     * The number of seconds the verification code is valid for.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj->timeout_secs = $timeoutSecs;

        return $obj;
    }
}
