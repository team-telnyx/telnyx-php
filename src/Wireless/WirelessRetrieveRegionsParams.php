<?php

declare(strict_types=1);

namespace Telnyx\Wireless;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve all wireless regions for the given product.
 *
 * @see Telnyx\Wireless->retrieveRegions
 *
 * @phpstan-type WirelessRetrieveRegionsParamsShape = array{product: string}
 */
final class WirelessRetrieveRegionsParams implements BaseModel
{
    /** @use SdkModel<WirelessRetrieveRegionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The product for which to list regions (e.g., 'public_ips', 'private_wireless_gateways').
     */
    #[Api]
    public string $product;

    /**
     * `new WirelessRetrieveRegionsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WirelessRetrieveRegionsParams::with(product: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WirelessRetrieveRegionsParams)->withProduct(...)
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
    public static function with(string $product): self
    {
        $obj = new self;

        $obj->product = $product;

        return $obj;
    }

    /**
     * The product for which to list regions (e.g., 'public_ips', 'private_wireless_gateways').
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj->product = $product;

        return $obj;
    }
}
