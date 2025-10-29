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
 * @see Telnyx\WireguardPeers->update
 *
 * @phpstan-type WireguardPeerUpdateParamsShape = array{publicKey?: string}
 */
final class WireguardPeerUpdateParams implements BaseModel
{
    /** @use SdkModel<WireguardPeerUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    #[Api('public_key', optional: true)]
    public ?string $publicKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $publicKey = null): self
    {
        $obj = new self;

        null !== $publicKey && $obj->publicKey = $publicKey;

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
