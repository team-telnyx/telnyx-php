<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new WireguardPeerCreateParams); // set properties as needed
 * $client->wireguardPeers->create(...$params->toArray());
 * ```
 * Create a new WireGuard Peer. Current limitation of 5 peers per interface can be created.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->wireguardPeers->create(...$params->toArray());`
 *
 * @see Telnyx\WireguardPeers->create
 *
 * @phpstan-type wireguard_peer_create_params = array{
 *   wireguardInterfaceID: string, publicKey?: string
 * }
 */
final class WireguardPeerCreateParams implements BaseModel
{
    /** @use SdkModel<wireguard_peer_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The id of the wireguard interface associated with the peer.
     */
    #[Api('wireguard_interface_id')]
    public string $wireguardInterfaceID;

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    #[Api('public_key', optional: true)]
    public ?string $publicKey;

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
    public static function with(
        string $wireguardInterfaceID,
        ?string $publicKey = null
    ): self {
        $obj = new self;

        $obj->wireguardInterfaceID = $wireguardInterfaceID;

        null !== $publicKey && $obj->publicKey = $publicKey;

        return $obj;
    }

    /**
     * The id of the wireguard interface associated with the peer.
     */
    public function withWireguardInterfaceID(string $wireguardInterfaceID): self
    {
        $obj = clone $this;
        $obj->wireguardInterfaceID = $wireguardInterfaceID;

        return $obj;
    }

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function withPublicKey(string $publicKey): self
    {
        $obj = clone $this;
        $obj->publicKey = $publicKey;

        return $obj;
    }
}
