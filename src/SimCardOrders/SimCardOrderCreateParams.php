<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new order for SIM cards.
 *
 * @see Telnyx\Services\SimCardOrdersService::create()
 *
 * @phpstan-type SimCardOrderCreateParamsShape = array{
 *   address_id: string, quantity: int
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
    #[Required]
    public string $address_id;

    /**
     * The amount of SIM cards to order.
     */
    #[Required]
    public int $quantity;

    /**
     * `new SimCardOrderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardOrderCreateParams::with(address_id: ..., quantity: ...)
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
    public static function with(string $address_id, int $quantity): self
    {
        $obj = new self;

        $obj['address_id'] = $address_id;
        $obj['quantity'] = $quantity;

        return $obj;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withAddressID(string $addressID): self
    {
        $obj = clone $this;
        $obj['address_id'] = $addressID;

        return $obj;
    }

    /**
     * The amount of SIM cards to order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj['quantity'] = $quantity;

        return $obj;
    }
}
