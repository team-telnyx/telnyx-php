<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a Global IP assignment.
 *
 * @see Telnyx\Services\GlobalIPAssignmentsService::create()
 *
 * @phpstan-type GlobalIPAssignmentCreateParamsShape = array{
 *   globalIPID?: string, isInMaintenance?: bool, wireguardPeerID?: string
 * }
 */
final class GlobalIPAssignmentCreateParams implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Global IP ID.
     */
    #[Optional('global_ip_id')]
    public ?string $globalIPID;

    /**
     * Enable/disable BGP announcement.
     */
    #[Optional('is_in_maintenance')]
    public ?bool $isInMaintenance;

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
    public static function with(
        ?string $globalIPID = null,
        ?bool $isInMaintenance = null,
        ?string $wireguardPeerID = null,
    ): self {
        $self = new self;

        null !== $globalIPID && $self['globalIPID'] = $globalIPID;
        null !== $isInMaintenance && $self['isInMaintenance'] = $isInMaintenance;
        null !== $wireguardPeerID && $self['wireguardPeerID'] = $wireguardPeerID;

        return $self;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIpid(string $globalIPID): self
    {
        $self = clone $this;
        $self['globalIPID'] = $globalIPID;

        return $self;
    }

    /**
     * Enable/disable BGP announcement.
     */
    public function withIsInMaintenance(bool $isInMaintenance): self
    {
        $self = clone $this;
        $self['isInMaintenance'] = $isInMaintenance;

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
