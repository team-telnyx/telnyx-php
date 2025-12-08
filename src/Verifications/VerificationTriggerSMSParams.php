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
 *   phone_number: string,
 *   verify_profile_id: string,
 *   custom_code?: string|null,
 *   timeout_secs?: int,
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
    #[Required]
    public string $phone_number;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Required]
    public string $verify_profile_id;

    /**
     * Send a self-generated numeric code to the end-user.
     */
    #[Optional(nullable: true)]
    public ?string $custom_code;

    /**
     * The number of seconds the verification code is valid for.
     */
    #[Optional]
    public ?int $timeout_secs;

    /**
     * `new VerificationTriggerSMSParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationTriggerSMSParams::with(phone_number: ..., verify_profile_id: ...)
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
        string $phone_number,
        string $verify_profile_id,
        ?string $custom_code = null,
        ?int $timeout_secs = null,
    ): self {
        $obj = new self;

        $obj['phone_number'] = $phone_number;
        $obj['verify_profile_id'] = $verify_profile_id;

        null !== $custom_code && $obj['custom_code'] = $custom_code;
        null !== $timeout_secs && $obj['timeout_secs'] = $timeout_secs;

        return $obj;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj['verify_profile_id'] = $verifyProfileID;

        return $obj;
    }

    /**
     * Send a self-generated numeric code to the end-user.
     */
    public function withCustomCode(?string $customCode): self
    {
        $obj = clone $this;
        $obj['custom_code'] = $customCode;

        return $obj;
    }

    /**
     * The number of seconds the verification code is valid for.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj['timeout_secs'] = $timeoutSecs;

        return $obj;
    }
}
