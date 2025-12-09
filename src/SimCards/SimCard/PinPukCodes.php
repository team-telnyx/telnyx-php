<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
 *
 * @phpstan-type PinPukCodesShape = array{
 *   pin1?: string|null, pin2?: string|null, puk1?: string|null, puk2?: string|null
 * }
 */
final class PinPukCodes implements BaseModel
{
    /** @use SdkModel<PinPukCodesShape> */
    use SdkModel;

    /**
     * The primary Personal Identification Number (PIN) for the SIM card. This is a 4-digit code used to protect the SIM card from unauthorized use.
     */
    #[Optional]
    public ?string $pin1;

    /**
     * The secondary Personal Identification Number (PIN2) for the SIM card. This is a 4-digit code used for additional security features.
     */
    #[Optional]
    public ?string $pin2;

    /**
     * The primary Personal Unblocking Key (PUK1) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN1 is entered incorrectly multiple times.
     */
    #[Optional]
    public ?string $puk1;

    /**
     * The secondary Personal Unblocking Key (PUK2) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN2 is entered incorrectly multiple times.
     */
    #[Optional]
    public ?string $puk2;

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
        ?string $pin1 = null,
        ?string $pin2 = null,
        ?string $puk1 = null,
        ?string $puk2 = null,
    ): self {
        $self = new self;

        null !== $pin1 && $self['pin1'] = $pin1;
        null !== $pin2 && $self['pin2'] = $pin2;
        null !== $puk1 && $self['puk1'] = $puk1;
        null !== $puk2 && $self['puk2'] = $puk2;

        return $self;
    }

    /**
     * The primary Personal Identification Number (PIN) for the SIM card. This is a 4-digit code used to protect the SIM card from unauthorized use.
     */
    public function withPin1(string $pin1): self
    {
        $self = clone $this;
        $self['pin1'] = $pin1;

        return $self;
    }

    /**
     * The secondary Personal Identification Number (PIN2) for the SIM card. This is a 4-digit code used for additional security features.
     */
    public function withPin2(string $pin2): self
    {
        $self = clone $this;
        $self['pin2'] = $pin2;

        return $self;
    }

    /**
     * The primary Personal Unblocking Key (PUK1) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN1 is entered incorrectly multiple times.
     */
    public function withPuk1(string $puk1): self
    {
        $self = clone $this;
        $self['puk1'] = $puk1;

        return $self;
    }

    /**
     * The secondary Personal Unblocking Key (PUK2) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN2 is entered incorrectly multiple times.
     */
    public function withPuk2(string $puk2): self
    {
        $self = clone $this;
        $self['puk2'] = $puk2;

        return $self;
    }
}
