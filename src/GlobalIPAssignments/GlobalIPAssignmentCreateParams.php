<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new GlobalIPAssignmentCreateParams); // set properties as needed
 * $client->globalIPAssignments->create(...$params->toArray());
 * ```
 * Create a Global IP assignment.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->globalIPAssignments->create(...$params->toArray());`
 *
 * @see Telnyx\GlobalIPAssignments->create
 *
 * @phpstan-type global_ip_assignment_create_params = array{
 *   globalIPID?: string, isInMaintenance?: bool, wireguardPeerID?: string
 * }
 */
final class GlobalIPAssignmentCreateParams implements BaseModel
{
    /** @use SdkModel<global_ip_assignment_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Global IP ID.
     */
    #[Api('global_ip_id', optional: true)]
    public ?string $globalIPID;

    /**
     * Enable/disable BGP announcement.
     */
    #[Api('is_in_maintenance', optional: true)]
    public ?bool $isInMaintenance;

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
        ?string $globalIPID = null,
        ?bool $isInMaintenance = null,
        ?string $wireguardPeerID = null,
    ): self {
        $obj = new self;

        null !== $globalIPID && $obj->globalIPID = $globalIPID;
        null !== $isInMaintenance && $obj->isInMaintenance = $isInMaintenance;
        null !== $wireguardPeerID && $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }

    /**
     * Global IP ID.
     */
    public function withGlobalIPID(string $globalIPID): self
    {
        $obj = clone $this;
        $obj->globalIPID = $globalIPID;

        return $obj;
    }

    /**
     * Enable/disable BGP announcement.
     */
    public function withIsInMaintenance(bool $isInMaintenance): self
    {
        $obj = clone $this;
        $obj->isInMaintenance = $isInMaintenance;

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
