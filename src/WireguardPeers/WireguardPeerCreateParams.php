<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new WireGuard Peer. Current limitation of 5 peers per interface can be created.
 *
 * @see Telnyx\Services\WireguardPeersService::create()
 *
 * @phpstan-type WireguardPeerCreateParamsShape = array{
 *   wireguard_interface_id: string, public_key?: string
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
    #[Api]
    public string $wireguard_interface_id;

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    #[Api(optional: true)]
    public ?string $public_key;

    /**
     * `new WireguardPeerCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WireguardPeerCreateParams::with(wireguard_interface_id: ...)
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
    public static function with(
        string $wireguard_interface_id,
        ?string $public_key = null
    ): self {
        $obj = new self;

        $obj['wireguard_interface_id'] = $wireguard_interface_id;

        null !== $public_key && $obj['public_key'] = $public_key;

        return $obj;
    }

    /**
     * The id of the wireguard interface associated with the peer.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $obj = clone $this;
        $obj['wireguard_interface_id'] = $wireguardInterfaceID;

        return $obj;
    }

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function withPublicKey(string $publicKey): self
    {
        $obj = clone $this;
        $obj['public_key'] = $publicKey;

        return $obj;
    }
}
