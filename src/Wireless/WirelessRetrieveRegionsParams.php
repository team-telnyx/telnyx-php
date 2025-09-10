<?php

declare(strict_types=1);

namespace Telnyx\Wireless;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WirelessRetrieveRegionsParams); // set properties as needed
 * $client->wireless->retrieveRegions(...$params->toArray());
 * ```
 * Retrieve all wireless regions for the given product.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->wireless->retrieveRegions(...$params->toArray());`
 *
 * @see Telnyx\Wireless->retrieveRegions
 *
 * @phpstan-type wireless_retrieve_regions_params = array{product: string}
 */
final class WirelessRetrieveRegionsParams implements BaseModel
{
    /** @use SdkModel<wireless_retrieve_regions_params> */
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
