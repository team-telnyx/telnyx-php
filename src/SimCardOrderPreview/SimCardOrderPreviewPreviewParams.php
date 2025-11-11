<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Preview SIM card order purchases.
 *
 * @see Telnyx\SimCardOrderPreview->preview
 *
 * @phpstan-type SimCardOrderPreviewPreviewParamsShape = array{
 *   address_id: string, quantity: int
 * }
 */
final class SimCardOrderPreviewPreviewParams implements BaseModel
{
    /** @use SdkModel<SimCardOrderPreviewPreviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Api]
    public string $address_id;

    /**
     * The amount of SIM cards that the user would like to purchase in the SIM card order.
     */
    #[Api]
    public int $quantity;

    /**
     * `new SimCardOrderPreviewPreviewParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardOrderPreviewPreviewParams::with(address_id: ..., quantity: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimCardOrderPreviewPreviewParams)->withAddressID(...)->withQuantity(...)
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

        $obj->address_id = $address_id;
        $obj->quantity = $quantity;

        return $obj;
    }

    /**
     * Uniquely identifies the address for the order.
     */
    public function withAddressID(string $addressID): self
    {
        $obj = clone $this;
        $obj->address_id = $addressID;

        return $obj;
    }

    /**
     * The amount of SIM cards that the user would like to purchase in the SIM card order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
