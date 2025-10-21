<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Trigger Call verification.
 *
 * @see Telnyx\Verifications->triggerCall
 *
 * @phpstan-type verification_trigger_call_params = array{
 *   phoneNumber: string,
 *   verifyProfileID: string,
 *   customCode?: string|null,
 *   extension?: string|null,
 *   timeoutSecs?: int,
 * }
 */
final class VerificationTriggerCallParams implements BaseModel
{
    /** @use SdkModel<verification_trigger_call_params> */
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
     * Send a self-generated numeric code to the end-user.
     */
    #[Api('custom_code', nullable: true, optional: true)]
    public ?string $customCode;

    /**
     * Optional extension to dial after call is answered using DTMF digits. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     */
    #[Api(nullable: true, optional: true)]
    public ?string $extension;

    /**
     * The number of seconds the verification code is valid for.
     */
    #[Api('timeout_secs', optional: true)]
    public ?int $timeoutSecs;

    /**
     * `new VerificationTriggerCallParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationTriggerCallParams::with(phoneNumber: ..., verifyProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationTriggerCallParams)
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
        ?string $extension = null,
        ?int $timeoutSecs = null,
    ): self {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;
        $obj->verifyProfileID = $verifyProfileID;

        null !== $customCode && $obj->customCode = $customCode;
        null !== $extension && $obj->extension = $extension;
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
     * Send a self-generated numeric code to the end-user.
     */
    public function withCustomCode(?string $customCode): self
    {
        $obj = clone $this;
        $obj->customCode = $customCode;

        return $obj;
    }

    /**
     * Optional extension to dial after call is answered using DTMF digits. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     */
    public function withExtension(?string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

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
