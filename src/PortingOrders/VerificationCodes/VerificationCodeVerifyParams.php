<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;

/**
 * Verifies the verification code for a list of phone numbers.
 *
 * @see Telnyx\Services\PortingOrders\VerificationCodesService::verify()
 *
 * @phpstan-type VerificationCodeVerifyParamsShape = array{
 *   verification_codes?: list<VerificationCode|array{
 *     code?: string|null, phone_number?: string|null
 *   }>,
 * }
 */
final class VerificationCodeVerifyParams implements BaseModel
{
    /** @use SdkModel<VerificationCodeVerifyParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<VerificationCode>|null $verification_codes */
    #[Api(list: VerificationCode::class, optional: true)]
    public ?array $verification_codes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VerificationCode|array{
     *   code?: string|null, phone_number?: string|null
     * }> $verification_codes
     */
    public static function with(?array $verification_codes = null): self
    {
        $obj = new self;

        null !== $verification_codes && $obj['verification_codes'] = $verification_codes;

        return $obj;
    }

    /**
     * @param list<VerificationCode|array{
     *   code?: string|null, phone_number?: string|null
     * }> $verificationCodes
     */
    public function withVerificationCodes(array $verificationCodes): self
    {
        $obj = clone $this;
        $obj['verification_codes'] = $verificationCodes;

        return $obj;
    }
}
