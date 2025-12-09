<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Asynchronously create a Private Wireless Gateway for SIM cards for a previously created network. This operation may take several minutes so you can check the Private Wireless Gateway status at the section Get a Private Wireless Gateway.
 *
 * @see Telnyx\Services\PrivateWirelessGatewaysService::create()
 *
 * @phpstan-type PrivateWirelessGatewayCreateParamsShape = array{
 *   name: string, networkID: string, regionCode?: string
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
    #[Required]
    public string $name;

    /**
     * The identification of the related network resource.
     */
    #[Required('network_id')]
    public string $networkID;

    /**
     * The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint.
     */
    #[Optional('region_code')]
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
        $self = new self;

        $self['name'] = $name;
        $self['networkID'] = $networkID;

        null !== $regionCode && $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The private wireless gateway name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The identification of the related network resource.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The code of the region where the private wireless gateway will be assigned. A list of available regions can be found at the regions endpoint.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
