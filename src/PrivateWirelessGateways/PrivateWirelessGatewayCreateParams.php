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
 * @phpstan-type private_wireless_gateway_create_params = array{
 *   name: string, networkID: string, regionCode?: string
 * }
 */
final class PrivateWirelessGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<private_wireless_gateway_create_params> */
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
    #[Api('network_id')]
    public string $networkID;

    /**
     * The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint.
     */
    #[Api('region_code', optional: true)]
    public ?string $regionCode;

    /**
     * `new PrivateWirelessGatewayCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PrivateWirelessGatewayCreateParams::with(name: ..., networkID: ...)
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
        string $networkID,
        ?string $regionCode = null
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->networkID = $networkID;

        null !== $regionCode && $obj->regionCode = $regionCode;

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
        $obj->networkID = $networkID;

        return $obj;
    }

    /**
     * The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
