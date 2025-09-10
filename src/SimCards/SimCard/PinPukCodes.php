<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * PIN and PUK codes for the SIM card. Only available when include_pin_puk_codes=true is set in the request.
 *
 * @phpstan-type pin_puk_codes = array{
 *   pin1?: string|null, pin2?: string|null, puk1?: string|null, puk2?: string|null
 * }
 */
final class PinPukCodes implements BaseModel
{
    /** @use SdkModel<pin_puk_codes> */
    use SdkModel;

    /**
     * The primary Personal Identification Number (PIN) for the SIM card. This is a 4-digit code used to protect the SIM card from unauthorized use.
     */
    #[Api(optional: true)]
    public ?string $pin1;

    /**
     * The secondary Personal Identification Number (PIN2) for the SIM card. This is a 4-digit code used for additional security features.
     */
    #[Api(optional: true)]
    public ?string $pin2;

    /**
     * The primary Personal Unblocking Key (PUK1) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN1 is entered incorrectly multiple times.
     */
    #[Api(optional: true)]
    public ?string $puk1;

    /**
     * The secondary Personal Unblocking Key (PUK2) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN2 is entered incorrectly multiple times.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $pin1 && $obj->pin1 = $pin1;
        null !== $pin2 && $obj->pin2 = $pin2;
        null !== $puk1 && $obj->puk1 = $puk1;
        null !== $puk2 && $obj->puk2 = $puk2;

        return $obj;
    }

    /**
     * The primary Personal Identification Number (PIN) for the SIM card. This is a 4-digit code used to protect the SIM card from unauthorized use.
     */
    public function withPin1(string $pin1): self
    {
        $obj = clone $this;
        $obj->pin1 = $pin1;

        return $obj;
    }

    /**
     * The secondary Personal Identification Number (PIN2) for the SIM card. This is a 4-digit code used for additional security features.
     */
    public function withPin2(string $pin2): self
    {
        $obj = clone $this;
        $obj->pin2 = $pin2;

        return $obj;
    }

    /**
     * The primary Personal Unblocking Key (PUK1) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN1 is entered incorrectly multiple times.
     */
    public function withPuk1(string $puk1): self
    {
        $obj = clone $this;
        $obj->puk1 = $puk1;

        return $obj;
    }

    /**
     * The secondary Personal Unblocking Key (PUK2) for the SIM card. This is an 8-digit code used to unlock the SIM card if PIN2 is entered incorrectly multiple times.
     */
    public function withPuk2(string $puk2): self
    {
        $obj = clone $this;
        $obj->puk2 = $puk2;

        return $obj;
    }
}
