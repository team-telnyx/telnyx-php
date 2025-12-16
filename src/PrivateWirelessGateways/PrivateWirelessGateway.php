<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PwgAssignedResourcesSummaryShape from \Telnyx\PrivateWirelessGateways\PwgAssignedResourcesSummary
 * @phpstan-import-type PrivateWirelessGatewayStatusShape from \Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayStatus
 *
 * @phpstan-type PrivateWirelessGatewayShape = array{
 *   id?: string|null,
 *   assignedResources?: list<PwgAssignedResourcesSummaryShape>|null,
 *   createdAt?: string|null,
 *   ipRange?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   recordType?: string|null,
 *   regionCode?: string|null,
 *   status?: null|PrivateWirelessGatewayStatus|PrivateWirelessGatewayStatusShape,
 *   updatedAt?: string|null,
 * }
 */
final class PrivateWirelessGateway implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * A list of the resources that have been assigned to the Private Wireless Gateway.
     *
     * @var list<PwgAssignedResourcesSummary>|null $assignedResources
     */
    #[Optional('assigned_resources', list: PwgAssignedResourcesSummary::class)]
    public ?array $assignedResources;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * IP block used to assign IPs to the SIM cards in the Private Wireless Gateway.
     */
    #[Optional('ip_range')]
    public ?string $ipRange;

    /**
     * The private wireless gateway name.
     */
    #[Optional]
    public ?string $name;

    /**
     * The identification of the related network resource.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    /**
     * The current status or failure details of the Private Wireless Gateway.
     */
    #[Optional]
    public ?PrivateWirelessGatewayStatus $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PwgAssignedResourcesSummaryShape> $assignedResources
     * @param PrivateWirelessGatewayStatusShape $status
     */
    public static function with(
        ?string $id = null,
        ?array $assignedResources = null,
        ?string $createdAt = null,
        ?string $ipRange = null,
        ?string $name = null,
        ?string $networkID = null,
        ?string $recordType = null,
        ?string $regionCode = null,
        PrivateWirelessGatewayStatus|array|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $assignedResources && $self['assignedResources'] = $assignedResources;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $ipRange && $self['ipRange'] = $ipRange;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionCode && $self['regionCode'] = $regionCode;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A list of the resources that have been assigned to the Private Wireless Gateway.
     *
     * @param list<PwgAssignedResourcesSummaryShape> $assignedResources
     */
    public function withAssignedResources(array $assignedResources): self
    {
        $self = clone $this;
        $self['assignedResources'] = $assignedResources;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * IP block used to assign IPs to the SIM cards in the Private Wireless Gateway.
     */
    public function withIPRange(string $ipRange): self
    {
        $self = clone $this;
        $self['ipRange'] = $ipRange;

        return $self;
    }

    /**
     * The private wireless gateway name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The identification of the related network resource.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The current status or failure details of the Private Wireless Gateway.
     *
     * @param PrivateWirelessGatewayStatusShape $status
     */
    public function withStatus(PrivateWirelessGatewayStatus|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
