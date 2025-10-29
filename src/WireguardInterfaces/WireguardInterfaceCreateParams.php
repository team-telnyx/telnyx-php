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
 * @see Telnyx\WireguardInterfaces->create
 *
 * @phpstan-type WireguardInterfaceCreateParamsShape = array{
 *   networkID: string, regionCode: string, enableSipTrunking?: bool, name?: string
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
    #[Api('network_id')]
    public string $networkID;

    /**
     * The region the interface should be deployed to.
     */
    #[Api('region_code')]
    public string $regionCode;

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    #[Api('enable_sip_trunking', optional: true)]
    public ?bool $enableSipTrunking;

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
     * WireguardInterfaceCreateParams::with(networkID: ..., regionCode: ...)
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
        string $networkID,
        string $regionCode,
        ?bool $enableSipTrunking = null,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->networkID = $networkID;
        $obj->regionCode = $regionCode;

        null !== $enableSipTrunking && $obj->enableSipTrunking = $enableSipTrunking;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->networkID = $networkID;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    public function withEnableSipTrunking(bool $enableSipTrunking): self
    {
        $obj = clone $this;
        $obj->enableSipTrunking = $enableSipTrunking;

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
