<?php

declare(strict_types=1);

namespace Telnyx\Networks\DefaultGateway;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create Default Gateway.
 *
 * @see Telnyx\Networks\DefaultGateway->create
 *
 * @phpstan-type DefaultGatewayCreateParamsShape = array{wireguardPeerID?: string}
 */
final class DefaultGatewayCreateParams implements BaseModel
{
    /** @use SdkModel<DefaultGatewayCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Wireguard peer ID.
     */
    #[Api('wireguard_peer_id', optional: true)]
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
        $obj = new self;

        null !== $wireguardPeerID && $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }

    /**
     * Wireguard peer ID.
     */
    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $obj = clone $this;
        $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }
}
