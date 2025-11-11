<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously create a Private Wireless Gateway for SIM cards for a previously created network. This operation may take several minutes so you can check the Private Wireless Gateway status at the section Get a Private Wireless Gateway.
 *
 * @see Telnyx\PrivateWirelessGateways->create
 *
 * @phpstan-type PrivateWirelessGatewayCreateParamsShape = array{
 *   name: string, network_id: string, region_code?: string
 * }
 */
final class PrivateWirelessGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The private wireless gateway name.
     */
    #[Api]
    public string $name;

    /**
     * The identification of the related network resource.
     */
    #[Api]
    public string $network_id;

    /**
     * The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint.
     */
    #[Api(optional: true)]
    public ?string $region_code;

    /**
     * `new PrivateWirelessGatewayCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PrivateWirelessGatewayCreateParams::with(name: ..., network_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PrivateWirelessGatewayCreateParams)->withName(...)->withNetworkID(...)
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
    public static function with(
        string $name,
        string $network_id,
        ?string $region_code = null
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->network_id = $network_id;

        null !== $region_code && $obj->region_code = $region_code;

        return $obj;
    }

    /**
     * The private wireless gateway name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The identification of the related network resource.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->network_id = $networkID;

        return $obj;
    }

    /**
     * The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->region_code = $regionCode;

        return $obj;
    }
}
