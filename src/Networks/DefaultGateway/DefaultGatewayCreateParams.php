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
 * @see Telnyx\Services\Networks\DefaultGatewayService::create()
 *
 * @phpstan-type DefaultGatewayCreateParamsShape = array{
 *   wireguard_peer_id?: string
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
    #[Api(optional: true)]
    public ?string $wireguard_peer_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $wireguard_peer_id = null): self
    {
        $obj = new self;

        null !== $wireguard_peer_id && $obj->wireguard_peer_id = $wireguard_peer_id;

        return $obj;
    }

    /**
     * Wireguard peer ID.
     */
    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $obj = clone $this;
        $obj->wireguard_peer_id = $wireguardPeerID;

        return $obj;
    }
}
