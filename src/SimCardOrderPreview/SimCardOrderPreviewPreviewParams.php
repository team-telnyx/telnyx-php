<?php

declare(strict_types=1);

namespace Telnyx\SimCardOrderPreview;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardOrderPreviewPreviewParams); // set properties as needed
 * $client->simCardOrderPreview->preview(...$params->toArray());
 * ```
 * Preview SIM card order purchases.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardOrderPreview->preview(...$params->toArray());`
 *
 * @see Telnyx\SimCardOrderPreview->preview
 *
 * @phpstan-type sim_card_order_preview_preview_params = array{
 *   addressID: string, quantity: int
 * }
 */
final class SimCardOrderPreviewPreviewParams implements BaseModel
{
    /** @use SdkModel<sim_card_order_preview_preview_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Uniquely identifies the address for the order.
     */
    #[Api('address_id')]
    public string $addressID;

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
     * SimCardOrderPreviewPreviewParams::with(addressID: ..., quantity: ...)
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
     * The amount of SIM cards that the user would like to purchase in the SIM card order.
     */
    public function withQuantity(int $quantity): self
    {
        $obj = clone $this;
        $obj->quantity = $quantity;

        return $obj;
    }
}
