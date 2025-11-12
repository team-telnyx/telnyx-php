<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new WireGuard Interface. Current limitation of 10 interfaces per user can be created.
 *
 * @see Telnyx\WireguardInterfacesService::create()
 *
 * @phpstan-type WireguardInterfaceCreateParamsShape = array{
 *   network_id: string,
 *   region_code: string,
 *   enable_sip_trunking?: bool,
 *   name?: string,
 * }
 */
final class WireguardInterfaceCreateParams implements BaseModel
{
    /** @use SdkModel<WireguardInterfaceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the network associated with the interface.
     */
    #[Api]
    public string $network_id;

    /**
     * The region the interface should be deployed to.
     */
    #[Api]
    public string $region_code;

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    #[Api(optional: true)]
    public ?bool $enable_sip_trunking;

    /**
     * A user specified name for the interface.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new WireguardInterfaceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WireguardInterfaceCreateParams::with(network_id: ..., region_code: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WireguardInterfaceCreateParams)->withNetworkID(...)->withRegionCode(...)
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
        string $network_id,
        string $region_code,
        ?bool $enable_sip_trunking = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->network_id = $network_id;
        $obj->region_code = $region_code;

        null !== $enable_sip_trunking && $obj->enable_sip_trunking = $enable_sip_trunking;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->network_id = $networkID;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->region_code = $regionCode;

        return $obj;
    }

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    public function withEnableSipTrunking(bool $enableSipTrunking): self
    {
        $obj = clone $this;
        $obj->enable_sip_trunking = $enableSipTrunking;

        return $obj;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
