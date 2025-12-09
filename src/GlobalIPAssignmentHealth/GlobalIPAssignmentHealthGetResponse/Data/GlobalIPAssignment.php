<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment\WireguardPeer;

/**
 * @phpstan-type GlobalIPAssignmentShape = array{
 *   id?: string|null,
 *   wireguardPeer?: WireguardPeer|null,
 *   wireguardPeerID?: string|null,
 * }
 */
final class GlobalIPAssignment implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentShape> */
    use SdkModel;

    /**
     * Global IP assignment ID.
     */
    #[Optional]
    public ?string $id;

    #[Optional('wireguard_peer')]
    public ?WireguardPeer $wireguardPeer;

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
     *
     * @param WireguardPeer|array{
     *   ipAddress?: string|null, name?: string|null
     * } $wireguardPeer
     */
    public static function with(
        ?string $id = null,
        WireguardPeer|array|null $wireguardPeer = null,
        ?string $wireguardPeerID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $wireguardPeer && $obj['wireguardPeer'] = $wireguardPeer;
        null !== $wireguardPeerID && $obj['wireguardPeerID'] = $wireguardPeerID;

        return $obj;
    }

    /**
     * Global IP assignment ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param WireguardPeer|array{
     *   ipAddress?: string|null, name?: string|null
     * } $wireguardPeer
     */
    public function withWireguardPeer(WireguardPeer|array $wireguardPeer): self
    {
        $obj = clone $this;
        $obj['wireguardPeer'] = $wireguardPeer;

        return $obj;
    }

    /**
     * Wireguard peer ID.
     */
    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $obj = clone $this;
        $obj['wireguardPeerID'] = $wireguardPeerID;

        return $obj;
    }
}
