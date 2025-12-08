<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse\Data\Region;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 *   name?: string|null,
 *   network_id?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 *   region_code?: string|null,
 *   bgp_asn: float,
 *   cloud_provider: value-of<CloudProvider>,
 *   cloud_provider_region: string,
 *   primary_cloud_account_id: string,
 *   bandwidth_mbps?: float|null,
 *   primary_bgp_key?: string|null,
 *   primary_cloud_ip?: string|null,
 *   primary_enabled?: bool|null,
 *   primary_routing_announcement?: bool|null,
 *   primary_telnyx_ip?: string|null,
 *   region?: Region|null,
 *   secondary_bgp_key?: string|null,
 *   secondary_cloud_account_id?: string|null,
 *   secondary_cloud_ip?: string|null,
 *   secondary_enabled?: bool|null,
 *   secondary_routing_announcement?: bool|null,
 *   secondary_telnyx_ip?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional]
    public ?string $updated_at;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Optional]
    public ?string $network_id;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

    /**
     * The region the interface should be deployed to.
     */
    #[Optional]
    public ?string $region_code;

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     */
    #[Required]
    public float $bgp_asn;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider> $cloud_provider
     */
    #[Required(enum: CloudProvider::class)]
    public string $cloud_provider;

    /**
     * The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Required]
    public string $cloud_provider_region;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    #[Required]
    public string $primary_cloud_account_id;

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Optional]
    public ?float $bandwidth_mbps;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Optional]
    public ?string $primary_bgp_key;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Optional]
    public ?string $primary_cloud_ip;

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Optional]
    public ?bool $primary_enabled;

    /**
     * Whether the primary BGP route is being announced.
     */
    #[Optional]
    public ?bool $primary_routing_announcement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional]
    public ?string $primary_telnyx_ip;

    #[Optional]
    public ?Region $region;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Optional]
    public ?string $secondary_bgp_key;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     */
    #[Optional]
    public ?string $secondary_cloud_account_id;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Optional]
    public ?string $secondary_cloud_ip;

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Optional]
    public ?bool $secondary_enabled;

    /**
     * Whether the secondary BGP route is being announced.
     */
    #[Optional]
    public ?bool $secondary_routing_announcement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional]
    public ?string $secondary_telnyx_ip;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   bgp_asn: ...,
     *   cloud_provider: ...,
     *   cloud_provider_region: ...,
     *   primary_cloud_account_id: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withBgpAsn(...)
     *   ->withCloudProvider(...)
     *   ->withCloudProviderRegion(...)
     *   ->withPrimaryCloudAccountID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CloudProvider|value-of<CloudProvider> $cloud_provider
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     * @param Region|array{
     *   code?: string|null, name?: string|null, record_type?: string|null
     * } $region
     */
    public static function with(
        float $bgp_asn,
        CloudProvider|string $cloud_provider,
        string $cloud_provider_region,
        string $primary_cloud_account_id,
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $updated_at = null,
        ?string $name = null,
        ?string $network_id = null,
        InterfaceStatus|string|null $status = null,
        ?string $region_code = null,
        ?float $bandwidth_mbps = null,
        ?string $primary_bgp_key = null,
        ?string $primary_cloud_ip = null,
        ?bool $primary_enabled = null,
        ?bool $primary_routing_announcement = null,
        ?string $primary_telnyx_ip = null,
        Region|array|null $region = null,
        ?string $secondary_bgp_key = null,
        ?string $secondary_cloud_account_id = null,
        ?string $secondary_cloud_ip = null,
        ?bool $secondary_enabled = null,
        ?bool $secondary_routing_announcement = null,
        ?string $secondary_telnyx_ip = null,
    ): self {
        $obj = new self;

        $obj['bgp_asn'] = $bgp_asn;
        $obj['cloud_provider'] = $cloud_provider;
        $obj['cloud_provider_region'] = $cloud_provider_region;
        $obj['primary_cloud_account_id'] = $primary_cloud_account_id;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $name && $obj['name'] = $name;
        null !== $network_id && $obj['network_id'] = $network_id;
        null !== $status && $obj['status'] = $status;
        null !== $region_code && $obj['region_code'] = $region_code;
        null !== $bandwidth_mbps && $obj['bandwidth_mbps'] = $bandwidth_mbps;
        null !== $primary_bgp_key && $obj['primary_bgp_key'] = $primary_bgp_key;
        null !== $primary_cloud_ip && $obj['primary_cloud_ip'] = $primary_cloud_ip;
        null !== $primary_enabled && $obj['primary_enabled'] = $primary_enabled;
        null !== $primary_routing_announcement && $obj['primary_routing_announcement'] = $primary_routing_announcement;
        null !== $primary_telnyx_ip && $obj['primary_telnyx_ip'] = $primary_telnyx_ip;
        null !== $region && $obj['region'] = $region;
        null !== $secondary_bgp_key && $obj['secondary_bgp_key'] = $secondary_bgp_key;
        null !== $secondary_cloud_account_id && $obj['secondary_cloud_account_id'] = $secondary_cloud_account_id;
        null !== $secondary_cloud_ip && $obj['secondary_cloud_ip'] = $secondary_cloud_ip;
        null !== $secondary_enabled && $obj['secondary_enabled'] = $secondary_enabled;
        null !== $secondary_routing_announcement && $obj['secondary_routing_announcement'] = $secondary_routing_announcement;
        null !== $secondary_telnyx_ip && $obj['secondary_telnyx_ip'] = $secondary_telnyx_ip;

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
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['network_id'] = $networkID;

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
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['region_code'] = $regionCode;

        return $obj;
    }

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     */
    public function withBgpAsn(float $bgpAsn): self
    {
        $obj = clone $this;
        $obj['bgp_asn'] = $bgpAsn;

        return $obj;
    }

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public function withCloudProvider(CloudProvider|string $cloudProvider): self
    {
        $obj = clone $this;
        $obj['cloud_provider'] = $cloudProvider;

        return $obj;
    }

    /**
     * The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj['cloud_provider_region'] = $cloudProviderRegion;

        return $obj;
    }

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    public function withPrimaryCloudAccountID(
        string $primaryCloudAccountID
    ): self {
        $obj = clone $this;
        $obj['primary_cloud_account_id'] = $primaryCloudAccountID;

        return $obj;
    }

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    public function withBandwidthMbps(float $bandwidthMbps): self
    {
        $obj = clone $this;
        $obj['bandwidth_mbps'] = $bandwidthMbps;

        return $obj;
    }

    /**
     * The authentication key for BGP peer configuration.
     */
    public function withPrimaryBgpKey(string $primaryBgpKey): self
    {
        $obj = clone $this;
        $obj['primary_bgp_key'] = $primaryBgpKey;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $obj = clone $this;
        $obj['primary_cloud_ip'] = $primaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $obj = clone $this;
        $obj['primary_enabled'] = $primaryEnabled;

        return $obj;
    }

    /**
     * Whether the primary BGP route is being announced.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj['primary_routing_announcement'] = $primaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withPrimaryTelnyxIP(string $primaryTelnyxIP): self
    {
        $obj = clone $this;
        $obj['primary_telnyx_ip'] = $primaryTelnyxIP;

        return $obj;
    }

    /**
     * @param Region|array{
     *   code?: string|null, name?: string|null, record_type?: string|null
     * } $region
     */
    public function withRegion(Region|array $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * The authentication key for BGP peer configuration.
     */
    public function withSecondaryBgpKey(string $secondaryBgpKey): self
    {
        $obj = clone $this;
        $obj['secondary_bgp_key'] = $secondaryBgpKey;

        return $obj;
    }

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     */
    public function withSecondaryCloudAccountID(
        string $secondaryCloudAccountID
    ): self {
        $obj = clone $this;
        $obj['secondary_cloud_account_id'] = $secondaryCloudAccountID;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $obj = clone $this;
        $obj['secondary_cloud_ip'] = $secondaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withSecondaryEnabled(bool $secondaryEnabled): self
    {
        $obj = clone $this;
        $obj['secondary_enabled'] = $secondaryEnabled;

        return $obj;
    }

    /**
     * Whether the secondary BGP route is being announced.
     */
    public function withSecondaryRoutingAnnouncement(
        bool $secondaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj['secondary_routing_announcement'] = $secondaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withSecondaryTelnyxIP(string $secondaryTelnyxIP): self
    {
        $obj = clone $this;
        $obj['secondary_telnyx_ip'] = $secondaryTelnyxIP;

        return $obj;
    }
}
