<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new WireGuard Interface. Current limitation of 10 interfaces per user can be created.
 *
 * @see Telnyx\Services\WireguardInterfacesService::create()
 *
 * @phpstan-type WireguardInterfaceCreateParamsShape = array{
 *   regionCode: string,
 *   enableSipTrunking?: bool,
 *   name?: string,
 *   networkID?: string,
 * }
 */
final class WireguardInterfaceCreateParams implements BaseModel
{
    /** @use SdkModel<WireguardInterfaceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The region the interface should be deployed to.
     */
    #[Required('region_code')]
    public string $regionCode;

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    #[Optional('enable_sip_trunking')]
    public ?bool $enableSipTrunking;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    /**
     * `new WireguardInterfaceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WireguardInterfaceCreateParams::with(regionCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WireguardInterfaceCreateParams)->withRegionCode(...)
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
        string $regionCode,
        ?bool $enableSipTrunking = null,
        ?string $name = null,
        ?string $networkID = null,
    ): self {
        $self = new self;

        $self['regionCode'] = $regionCode;

        null !== $enableSipTrunking && $self['enableSipTrunking'] = $enableSipTrunking;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    public function withEnableSipTrunking(bool $enableSipTrunking): self
    {
        $self = clone $this;
        $self['enableSipTrunking'] = $enableSipTrunking;

        return $self;
    }

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }
}
