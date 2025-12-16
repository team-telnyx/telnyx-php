<?php

declare(strict_types=1);

namespace Telnyx\Networks\DefaultGateway;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create Default Gateway.
 *
 * @see Telnyx\Services\Networks\DefaultGatewayService::create()
 *
 * @phpstan-type DefaultGatewayCreateParamsShape = array{
 *   wireguardPeerID?: string|null
 * }
 */
final class DefaultGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<DefaultGatewayCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Wireguard peer ID.
     */
    #[Optional('wireguard_peer_id')]
    public ?string $wireguardPeerID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $wireguardPeerID = null): self
    {
        $self = new self;

        null !== $wireguardPeerID && $self['wireguardPeerID'] = $wireguardPeerID;

        return $self;
    }

    /**
     * Wireguard peer ID.
     */
    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $self = clone $this;
        $self['wireguardPeerID'] = $wireguardPeerID;

        return $self;
    }
}
