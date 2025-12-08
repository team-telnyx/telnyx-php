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
 *   wireguard_peer?: WireguardPeer|null,
 *   wireguard_peer_id?: string|null,
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

    #[Optional]
    public ?WireguardPeer $wireguard_peer;

    /**
     * Wireguard peer ID.
     */
    #[Optional]
    public ?string $wireguard_peer_id;

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
     *   ip_address?: string|null, name?: string|null
     * } $wireguard_peer
     */
    public static function with(
        ?string $id = null,
        WireguardPeer|array|null $wireguard_peer = null,
        ?string $wireguard_peer_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $wireguard_peer && $obj['wireguard_peer'] = $wireguard_peer;
        null !== $wireguard_peer_id && $obj['wireguard_peer_id'] = $wireguard_peer_id;

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
     *   ip_address?: string|null, name?: string|null
     * } $wireguardPeer
     */
    public function withWireguardPeer(WireguardPeer|array $wireguardPeer): self
    {
        $obj = clone $this;
        $obj['wireguard_peer'] = $wireguardPeer;

        return $obj;
    }

    /**
     * Wireguard peer ID.
     */
    public function withWireguardPeerID(string $wireguardPeerID): self
    {
        $obj = clone $this;
        $obj['wireguard_peer_id'] = $wireguardPeerID;

        return $obj;
    }
}
