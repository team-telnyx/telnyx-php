<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new WireGuard Peer. Current limitation of 5 peers per interface can be created.
 *
 * @see Telnyx\Services\WireguardPeersService::create()
 *
 * @phpstan-type WireguardPeerCreateParamsShape = array{
 *   wireguardInterfaceID: string
 * }
 */
final class WireguardPeerCreateParams implements BaseModel
{
    /** @use SdkModel<WireguardPeerCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the wireguard interface associated with the peer.
     */
    #[Required('wireguard_interface_id')]
    public string $wireguardInterfaceID;

    /**
     * `new WireguardPeerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WireguardPeerCreateParams::with(wireguardInterfaceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WireguardPeerCreateParams)->withWireguardInterfaceID(...)
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
    public static function with(string $wireguardInterfaceID): self
    {
        $self = new self;

        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }

    /**
     * The id of the wireguard interface associated with the peer.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $self = clone $this;
        $self['wireguardInterfaceID'] = $wireguardInterfaceID;

        return $self;
    }
}
