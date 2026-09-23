<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PrivateWirelessGateways\WirelessPrivateWirelessGateway\AddressMode;

/**
 * @phpstan-import-type PwgAssignedResourcesSummaryShape from \Telnyx\PrivateWirelessGateways\PwgAssignedResourcesSummary
 * @phpstan-import-type PrivateWirelessGatewayStatusShape from \Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayStatus
 *
 * @phpstan-type WirelessPrivateWirelessGatewayShape = array{
 *   id?: string|null,
 *   addressMode?: null|AddressMode|value-of<AddressMode>,
 *   assignedResources?: list<PwgAssignedResourcesSummary|PwgAssignedResourcesSummaryShape>|null,
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
final class WirelessPrivateWirelessGateway implements BaseModel
{
    /** @use SdkModel<WirelessPrivateWirelessGatewayShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The address mode of the private wireless gateway. With static, each SIM card gets a fixed IP address from the gateway's IP range that is preserved across sessions. With dynamic, IP addresses are assigned by the network at attach time and may change between sessions.
     *
     * @var value-of<AddressMode>|null $addressMode
     */
    #[Optional('address_mode', enum: AddressMode::class)]
    public ?string $addressMode;

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
     * @param AddressMode|value-of<AddressMode>|null $addressMode
     * @param list<PwgAssignedResourcesSummary|PwgAssignedResourcesSummaryShape>|null $assignedResources
     * @param PrivateWirelessGatewayStatus|PrivateWirelessGatewayStatusShape|null $status
     */
    public static function with(
        ?string $id = null,
        AddressMode|string|null $addressMode = null,
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
        null !== $addressMode && $self['addressMode'] = $addressMode;
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
     * The address mode of the private wireless gateway. With static, each SIM card gets a fixed IP address from the gateway's IP range that is preserved across sessions. With dynamic, IP addresses are assigned by the network at attach time and may change between sessions.
     *
     * @param AddressMode|value-of<AddressMode> $addressMode
     */
    public function withAddressMode(AddressMode|string $addressMode): self
    {
        $self = clone $this;
        $self['addressMode'] = $addressMode;

        return $self;
    }

    /**
     * A list of the resources that have been assigned to the Private Wireless Gateway.
     *
     * @param list<PwgAssignedResourcesSummary|PwgAssignedResourcesSummaryShape> $assignedResources
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
     * @param PrivateWirelessGatewayStatus|PrivateWirelessGatewayStatusShape $status
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
