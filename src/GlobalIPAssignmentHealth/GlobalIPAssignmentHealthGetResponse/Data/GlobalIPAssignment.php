<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment\WireguardPeer;

/**
 * @phpstan-import-type WireguardPeerShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment\WireguardPeer
 *
 * @phpstan-type GlobalIPAssignmentShape = array{
 *   id?: string|null,
 *   wireguardPeer?: null|WireguardPeer|WireguardPeerShape,
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
     * @param WireguardPeerShape $wireguardPeer
     */
    public static function with(
        ?string $id = null,
        WireguardPeer|array|null $wireguardPeer = null,
        ?string $wireguardPeerID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $wireguardPeer && $self['wireguardPeer'] = $wireguardPeer;
        null !== $wireguardPeerID && $self['wireguardPeerID'] = $wireguardPeerID;

        return $self;
    }

    /**
     * Global IP assignment ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param WireguardPeerShape $wireguardPeer
     */
    public function withWireguardPeer(WireguardPeer|array $wireguardPeer): self
    {
        $self = clone $this;
        $self['wireguardPeer'] = $wireguardPeer;

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
