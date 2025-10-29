<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new order for SIM cards.
 *
 * @see Telnyx\SimCardOrders->create
 *
 * @phpstan-type SimCardOrderCreateParamsShape = array{
 *   addressID: string, quantity: int
 * }
 */
final class SimCardOrderCreateParams implements BaseModel
{
    /** @use SdkModel<SimCardOrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Api('address_id')]
    public string $addressID;

    /**
     * The amount of SIM cards to order.
     */
    #[Api]
    public int $quantity;

    /**
     * `new SimCardOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardOrderCreateParams::with(addressID: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimCardOrderCreateParams)->withAddressID(...)->withQuantity(...)
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
    public static function with(string $addressID, int $quantity): self
    {
        $obj = new self;

        $obj->addressID = $addressID;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withAddressID(string $addressID): self
    {
        $obj = clone $this;
        $obj->addressID = $addressID;

        return $obj;
    }

    /**
     * The amount of SIM cards to order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
