<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayStatus\Value;

/**
 * @phpstan-type PrivateWirelessGatewayShape = array{
 *   id?: string|null,
 *   assigned_resources?: list<PwgAssignedResourcesSummary>|null,
 *   created_at?: string|null,
 *   ip_range?: string|null,
 *   name?: string|null,
 *   network_id?: string|null,
 *   record_type?: string|null,
 *   region_code?: string|null,
 *   status?: PrivateWirelessGatewayStatus|null,
 *   updated_at?: string|null,
 * }
 */
final class PrivateWirelessGateway implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * A list of the resources that have been assigned to the Private Wireless Gateway.
     *
     * @var list<PwgAssignedResourcesSummary>|null $assigned_resources
     */
    #[Api(list: PwgAssignedResourcesSummary::class, optional: true)]
    public ?array $assigned_resources;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * IP block used to assign IPs to the SIM cards in the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?string $ip_range;

    /**
     * The private wireless gateway name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The identification of the related network resource.
     */
    #[Api(optional: true)]
    public ?string $network_id;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    #[Api(optional: true)]
    public ?string $region_code;

    /**
     * The current status or failure details of the Private Wireless Gateway.
     */
    #[Api(optional: true)]
    public ?PrivateWirelessGatewayStatus $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
     *   count?: int|null, record_type?: string|null
     * }> $assigned_resources
     * @param PrivateWirelessGatewayStatus|array{
     *   error_code?: string|null,
     *   error_description?: string|null,
     *   value?: value-of<Value>|null,
     * } $status
     */
    public static function with(
        ?string $id = null,
        ?array $assigned_resources = null,
        ?string $created_at = null,
        ?string $ip_range = null,
        ?string $name = null,
        ?string $network_id = null,
        ?string $record_type = null,
        ?string $region_code = null,
        PrivateWirelessGatewayStatus|array|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $assigned_resources && $obj['assigned_resources'] = $assigned_resources;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $ip_range && $obj['ip_range'] = $ip_range;
        null !== $name && $obj['name'] = $name;
        null !== $network_id && $obj['network_id'] = $network_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $region_code && $obj['region_code'] = $region_code;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
     *   count?: int|null, record_type?: string|null
     * }> $assignedResources
     */
    public function withAssignedResources(array $assignedResources): self
    {
        $obj = clone $this;
        $obj['assigned_resources'] = $assignedResources;

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
     * IP block used to assign IPs to the SIM cards in the Private Wireless Gateway.
     */
    public function withIPRange(string $ipRange): self
    {
        $obj = clone $this;
        $obj['ip_range'] = $ipRange;

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
        $obj['network_id'] = $networkID;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The name of the region where the Private Wireless Gateway is deployed.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['region_code'] = $regionCode;

        return $obj;
    }

    /**
     * The current status or failure details of the Private Wireless Gateway.
     *
     * @param PrivateWirelessGatewayStatus|array{
     *   error_code?: string|null,
     *   error_description?: string|null,
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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
