<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type BodyShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 *   global_ip_id?: string|null,
 *   is_announced?: bool|null,
 *   is_connected?: bool|null,
 *   is_in_maintenance?: bool|null,
 *   status?: value-of<InterfaceStatus>|null,
 *   wireguard_peer_id?: string|null,
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * Global IP ID.
     */
    #[Api(optional: true)]
    public ?string $global_ip_id;

    /**
     * Status of BGP announcement.
     */
    #[Api(optional: true)]
    public ?bool $is_announced;

    /**
     * Wireguard peer is connected.
     */
    #[Api(optional: true)]
    public ?bool $is_connected;

    /**
     * Enable/disable BGP announcement.
     */
    #[Api(optional: true)]
    public ?bool $is_in_maintenance;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Api(enum: InterfaceStatus::class, optional: true)]
    public ?string $status;

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
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $updated_at = null,
        ?string $global_ip_id = null,
        ?bool $is_announced = null,
        ?bool $is_connected = null,
        ?bool $is_in_maintenance = null,
        InterfaceStatus|string|null $status = null,
        ?string $wireguard_peer_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $global_ip_id && $obj['global_ip_id'] = $global_ip_id;
        null !== $is_announced && $obj['is_announced'] = $is_announced;
        null !== $is_connected && $obj['is_connected'] = $is_connected;
        null !== $is_in_maintenance && $obj['is_in_maintenance'] = $is_in_maintenance;
        null !== $status && $obj['status'] = $status;
        null !== $wireguard_peer_id && $obj['wireguard_peer_id'] = $wireguard_peer_id;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

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
     * Status of BGP announcement.
     */
    public function withIsAnnounced(bool $isAnnounced): self
    {
        $obj = clone $this;
        $obj['is_announced'] = $isAnnounced;

        return $obj;
    }

    /**
     * Wireguard peer is connected.
     */
    public function withIsConnected(bool $isConnected): self
    {
        $obj = clone $this;
        $obj['is_connected'] = $isConnected;

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
     * The current status of the interface deployment.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

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
