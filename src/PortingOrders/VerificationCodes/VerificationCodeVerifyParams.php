<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;

/**
 * Verifies the verification code for a list of phone numbers.
 *
 * @see Telnyx\Services\PortingOrders\VerificationCodesService::verify()
 *
 * @phpstan-import-type VerificationCodeShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode
 *
 * @phpstan-type VerificationCodeVerifyParamsShape = array{
 *   verificationCodes?: list<VerificationCode|VerificationCodeShape>|null
 * }
 */
final class VerificationCodeVerifyParams implements BaseModel
{
    /** @use SdkModel<VerificationCodeVerifyParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<VerificationCode>|null $verificationCodes */
    #[Optional('verification_codes', list: VerificationCode::class)]
    public ?array $verificationCodes;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VerificationCode|VerificationCodeShape>|null $verificationCodes
     */
    public static function with(?array $verificationCodes = null): self
    {
        $self = new self;

        null !== $verificationCodes && $self['verificationCodes'] = $verificationCodes;

        return $self;
    }

    /**
     * @param list<VerificationCode|VerificationCodeShape> $verificationCodes
     */
    public function withVerificationCodes(array $verificationCodes): self
    {
        $self = clone $this;
        $self['verificationCodes'] = $verificationCodes;

        return $self;
    }
}
