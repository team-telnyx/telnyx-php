<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VerificationCodeShape = array{code: string, phoneNumber: string}
 */
final class VerificationCode implements BaseModel
{
    /** @use SdkModel<VerificationCodeShape> */
    use SdkModel;

    #[Required]
    public string $code;

    #[Required('phone_number')]
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
        $self = new self;

        $self['code'] = $code;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
