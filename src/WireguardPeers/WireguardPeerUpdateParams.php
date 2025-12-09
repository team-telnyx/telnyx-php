<?php

declare(strict_types=1);

namespace Telnyx\WireguardPeers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the WireGuard peer.
 *
 * @see Telnyx\Services\WireguardPeersService::update()
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
    #[Optional('public_key')]
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
        $self = new self;

        null !== $publicKey && $self['publicKey'] = $publicKey;

        return $self;
    }

    /**
     * The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function withPublicKey(string $publicKey): self
    {
        $self = clone $this;
        $self['publicKey'] = $publicKey;

        return $self;
    }
}
