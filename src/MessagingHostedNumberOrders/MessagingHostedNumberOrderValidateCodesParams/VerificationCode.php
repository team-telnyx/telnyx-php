<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerificationCodeShape = array{code: string, phoneNumber: string}
 */
final class VerificationCode implements BaseModel
{
    /** @use SdkModel<VerificationCodeShape> */
    use SdkModel;

    #[Api]
    public string $code;

    #[Api('phone_number')]
    public string $phoneNumber;

    /**
     * `new VerificationCode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationCode::with(code: ..., phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationCode)->withCode(...)->withPhoneNumber(...)
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
    public static function with(string $code, string $phoneNumber): self
    {
        $obj = new self;

        $obj->code = $code;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
