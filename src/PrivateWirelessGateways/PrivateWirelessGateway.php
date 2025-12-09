<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayStatus\Value;

/**
 * @phpstan-type PrivateWirelessGatewayShape = array{
 *   id?: string|null,
 *   assignedResources?: list<PwgAssignedResourcesSummary>|null,
 *   createdAt?: string|null,
 *   ipRange?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   recordType?: string|null,
 *   regionCode?: string|null,
 *   status?: PrivateWirelessGatewayStatus|null,
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
     * @param list<PwgAssignedResourcesSummary|array{
     *   count?: int|null, recordType?: string|null
     * }> $assignedResources
     * @param PrivateWirelessGatewayStatus|array{
     *   errorCode?: string|null,
     *   errorDescription?: string|null,
     *   value?: value-of<Value>|null,
     * } $status
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $assignedResources && $obj['assignedResources'] = $assignedResources;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $ipRange && $obj['ipRange'] = $ipRange;
        null !== $name && $obj['name'] = $name;
        null !== $networkID && $obj['networkID'] = $networkID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regionCode && $obj['regionCode'] = $regionCode;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
     * A list of the resources that have been assigned to the Private Wireless Gateway.
     *
     * @param list<PwgAssignedResourcesSummary|array{
     *   count?: int|null, recordType?: string|null
     * }> $assignedResources
     */
    public function withAssignedResources(array $assignedResources): self
    {
        $obj = clone $this;
        $obj['assignedResources'] = $assignedResources;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * IP block used to assign IPs to the SIM cards in the Private Wireless Gateway.
     */
    public function withIPRange(string $ipRange): self
    {
        $obj = clone $this;
        $obj['ipRange'] = $ipRange;

        return $obj;
    }

    /**
     * The private wireless gateway name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The identification of the related network resource.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['networkID'] = $networkID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['regionCode'] = $regionCode;

        return $obj;
    }

    /**
     * The current status or failure details of the Private Wireless Gateway.
     *
     * @param PrivateWirelessGatewayStatus|array{
     *   errorCode?: string|null,
     *   errorDescription?: string|null,
     *   value?: value-of<Value>|null,
     * } $status
     */
    public function withStatus(PrivateWirelessGatewayStatus|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
