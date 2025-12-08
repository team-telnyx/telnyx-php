<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerificationCodeShape = array{
 *   code?: string|null, phone_number?: string|null
 * }
 */
final class VerificationCode implements BaseModel
{
    /** @use SdkModel<VerificationCodeShape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $phone_number;

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
        ?string $code = null,
        ?string $phone_number = null
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $phone_number && $obj['phone_number'] = $phone_number;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }
}
