<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment\WireguardPeer;

/**
 * @phpstan-type GlobalIPAssignmentShape = array{
 *   id?: string, wireguardPeer?: WireguardPeer, wireguardPeerID?: string
 * }
 */
final class GlobalIPAssignment implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentShape> */
    use SdkModel;

    /**
     * Global IP assignment ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('wireguard_peer', optional: true)]
    public ?WireguardPeer $wireguardPeer;

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
    public static function with(
        ?string $id = null,
        ?WireguardPeer $wireguardPeer = null,
        ?string $wireguardPeerID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $wireguardPeer && $obj->wireguardPeer = $wireguardPeer;
        null !== $wireguardPeerID && $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }

    /**
     * Global IP assignment ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withWireguardPeer(WireguardPeer $wireguardPeer): self
    {
        $obj = clone $this;
        $obj->wireguardPeer = $wireguardPeer;

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
