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
 *   global_ip_id?: string, is_in_maintenance?: bool, wireguard_peer_id?: string
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
    #[Optional]
    public ?string $global_ip_id;

    /**
     * Enable/disable BGP announcement.
     */
    #[Optional]
    public ?bool $is_in_maintenance;

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
     */
    public static function with(
        ?string $global_ip_id = null,
        ?bool $is_in_maintenance = null,
        ?string $wireguard_peer_id = null,
    ): self {
        $obj = new self;

        null !== $global_ip_id && $obj['global_ip_id'] = $global_ip_id;
        null !== $is_in_maintenance && $obj['is_in_maintenance'] = $is_in_maintenance;
        null !== $wireguard_peer_id && $obj['wireguard_peer_id'] = $wireguard_peer_id;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIPID(string $globalIPID): self
    {
        $obj = clone $this;
        $obj['global_ip_id'] = $globalIPID;

        return $obj;
    }

    /**
     * Enable/disable BGP announcement.
     */
    public function withIsInMaintenance(bool $isInMaintenance): self
    {
        $obj = clone $this;
        $obj['is_in_maintenance'] = $isInMaintenance;

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
