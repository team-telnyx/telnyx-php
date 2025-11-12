<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the WireGuard peer.
 *
 * @see Telnyx\WireguardPeersService::update()
 *
 * @phpstan-type WireguardPeerUpdateParamsShape = array{public_key?: string}
 */
final class WireguardPeerUpdateParams implements BaseModel
{
    /** @use SdkModel<WireguardPeerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    #[Api(optional: true)]
    public ?string $public_key;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $public_key = null): self
    {
        $obj = new self;

        null !== $public_key && $obj->public_key = $public_key;

        return $obj;
    }

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function withPublicKey(string $publicKey): self
    {
        $obj = clone $this;
        $obj->public_key = $publicKey;

        return $obj;
    }
}
