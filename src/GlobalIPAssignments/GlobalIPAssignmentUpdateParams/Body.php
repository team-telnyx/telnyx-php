<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments\GlobalIPAssignmentUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * @phpstan-type body_alias = array{
 *   id?: string,
 *   createdAt?: string,
 *   recordType?: string,
 *   updatedAt?: string,
 *   globalIPID?: string,
 *   isAnnounced?: bool,
 *   isConnected?: bool,
 *   isInMaintenance?: bool,
 *   status?: value-of<InterfaceStatus>,
 *   wireguardPeerID?: string,
 * }
 */
final class Body implements BaseModel
{
    /** @use SdkModel<body_alias> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

    /**
     * Global IP ID.
     */
    #[Api('global_ip_id', optional: true)]
    public ?string $globalIPID;

    /**
     * Status of BGP announcement.
     */
    #[Api('is_announced', optional: true)]
    public ?bool $isAnnounced;

    /**
     * Wireguard peer is connected.
     */
    #[Api('is_connected', optional: true)]
    public ?bool $isConnected;

    /**
     * Enable/disable BGP announcement.
     */
    #[Api('is_in_maintenance', optional: true)]
    public ?bool $isInMaintenance;

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
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $globalIPID = null,
        ?bool $isAnnounced = null,
        ?bool $isConnected = null,
        ?bool $isInMaintenance = null,
        InterfaceStatus|string|null $status = null,
        ?string $wireguardPeerID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $globalIPID && $obj->globalIPID = $globalIPID;
        null !== $isAnnounced && $obj->isAnnounced = $isAnnounced;
        null !== $isConnected && $obj->isConnected = $isConnected;
        null !== $isInMaintenance && $obj->isInMaintenance = $isInMaintenance;
        null !== $status && $obj['status'] = $status;
        null !== $wireguardPeerID && $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

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
     * Status of BGP announcement.
     */
    public function withIsAnnounced(bool $isAnnounced): self
    {
        $obj = clone $this;
        $obj->isAnnounced = $isAnnounced;

        return $obj;
    }

    /**
     * Wireguard peer is connected.
     */
    public function withIsConnected(bool $isConnected): self
    {
        $obj = clone $this;
        $obj->isConnected = $isConnected;

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
        $obj->wireguardPeerID = $wireguardPeerID;

        return $obj;
    }
}
