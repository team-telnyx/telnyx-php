<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse\Data\Region;

/**
 * @phpstan-type data_alias = array{
 *   id?: string,
 *   createdAt?: string,
 *   recordType?: string,
 *   updatedAt?: string,
 *   name?: string,
 *   networkID?: string,
 *   status?: value-of<InterfaceStatus>,
 *   regionCode?: string,
 *   bgpAsn: float,
 *   cloudProvider: value-of<CloudProvider>,
 *   cloudProviderRegion: string,
 *   primaryCloudAccountID: string,
 *   bandwidthMbps?: float,
 *   primaryBgpKey?: string,
 *   primaryCloudIP?: string,
 *   primaryEnabled?: bool,
 *   primaryRoutingAnnouncement?: bool,
 *   primaryTelnyxIP?: string,
 *   region?: Region,
 *   secondaryBgpKey?: string,
 *   secondaryCloudAccountID?: string,
 *   secondaryCloudIP?: string,
 *   secondaryEnabled?: bool,
 *   secondaryRoutingAnnouncement?: bool,
 *   secondaryTelnyxIP?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
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
     * A user specified name for the interface.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Api('network_id', optional: true)]
    public ?string $networkID;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Api(enum: InterfaceStatus::class, optional: true)]
    public ?string $status;

    /**
     * The region the interface should be deployed to.
     */
    #[Api('region_code', optional: true)]
    public ?string $regionCode;

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     */
    #[Api('bgp_asn')]
    public float $bgpAsn;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider> $cloudProvider
     */
    #[Api('cloud_provider', enum: CloudProvider::class)]
    public string $cloudProvider;

    /**
     * The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Api('cloud_provider_region')]
    public string $cloudProviderRegion;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    #[Api('primary_cloud_account_id')]
    public string $primaryCloudAccountID;

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Api('bandwidth_mbps', optional: true)]
    public ?float $bandwidthMbps;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Api('primary_bgp_key', optional: true)]
    public ?string $primaryBgpKey;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Api('primary_cloud_ip', optional: true)]
    public ?string $primaryCloudIP;

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Api('primary_enabled', optional: true)]
    public ?bool $primaryEnabled;

    /**
     * Whether the primary BGP route is being announced.
     */
    #[Api('primary_routing_announcement', optional: true)]
    public ?bool $primaryRoutingAnnouncement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Api('primary_telnyx_ip', optional: true)]
    public ?string $primaryTelnyxIP;

    #[Api(optional: true)]
    public ?Region $region;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Api('secondary_bgp_key', optional: true)]
    public ?string $secondaryBgpKey;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     */
    #[Api('secondary_cloud_account_id', optional: true)]
    public ?string $secondaryCloudAccountID;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Api('secondary_cloud_ip', optional: true)]
    public ?string $secondaryCloudIP;

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Api('secondary_enabled', optional: true)]
    public ?bool $secondaryEnabled;

    /**
     * Whether the secondary BGP route is being announced.
     */
    #[Api('secondary_routing_announcement', optional: true)]
    public ?bool $secondaryRoutingAnnouncement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Api('secondary_telnyx_ip', optional: true)]
    public ?string $secondaryTelnyxIP;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   bgpAsn: ...,
     *   cloudProvider: ...,
     *   cloudProviderRegion: ...,
     *   primaryCloudAccountID: ...,
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
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        float $bgpAsn,
        CloudProvider|string $cloudProvider,
        string $cloudProviderRegion,
        string $primaryCloudAccountID,
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $name = null,
        ?string $networkID = null,
        InterfaceStatus|string|null $status = null,
        ?string $regionCode = null,
        ?float $bandwidthMbps = null,
        ?string $primaryBgpKey = null,
        ?string $primaryCloudIP = null,
        ?bool $primaryEnabled = null,
        ?bool $primaryRoutingAnnouncement = null,
        ?string $primaryTelnyxIP = null,
        ?Region $region = null,
        ?string $secondaryBgpKey = null,
        ?string $secondaryCloudAccountID = null,
        ?string $secondaryCloudIP = null,
        ?bool $secondaryEnabled = null,
        ?bool $secondaryRoutingAnnouncement = null,
        ?string $secondaryTelnyxIP = null,
    ): self {
        $obj = new self;

        $obj->bgpAsn = $bgpAsn;
        $obj->cloudProvider = $cloudProvider instanceof CloudProvider ? $cloudProvider->value : $cloudProvider;
        $obj->cloudProviderRegion = $cloudProviderRegion;
        $obj->primaryCloudAccountID = $primaryCloudAccountID;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $name && $obj->name = $name;
        null !== $networkID && $obj->networkID = $networkID;
        null !== $status && $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;
        null !== $regionCode && $obj->regionCode = $regionCode;
        null !== $bandwidthMbps && $obj->bandwidthMbps = $bandwidthMbps;
        null !== $primaryBgpKey && $obj->primaryBgpKey = $primaryBgpKey;
        null !== $primaryCloudIP && $obj->primaryCloudIP = $primaryCloudIP;
        null !== $primaryEnabled && $obj->primaryEnabled = $primaryEnabled;
        null !== $primaryRoutingAnnouncement && $obj->primaryRoutingAnnouncement = $primaryRoutingAnnouncement;
        null !== $primaryTelnyxIP && $obj->primaryTelnyxIP = $primaryTelnyxIP;
        null !== $region && $obj->region = $region;
        null !== $secondaryBgpKey && $obj->secondaryBgpKey = $secondaryBgpKey;
        null !== $secondaryCloudAccountID && $obj->secondaryCloudAccountID = $secondaryCloudAccountID;
        null !== $secondaryCloudIP && $obj->secondaryCloudIP = $secondaryCloudIP;
        null !== $secondaryEnabled && $obj->secondaryEnabled = $secondaryEnabled;
        null !== $secondaryRoutingAnnouncement && $obj->secondaryRoutingAnnouncement = $secondaryRoutingAnnouncement;
        null !== $secondaryTelnyxIP && $obj->secondaryTelnyxIP = $secondaryTelnyxIP;

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
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->networkID = $networkID;

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
        $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     */
    public function withBgpAsn(float $bgpAsn): self
    {
        $obj = clone $this;
        $obj->bgpAsn = $bgpAsn;

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
        $obj->cloudProvider = $cloudProvider instanceof CloudProvider ? $cloudProvider->value : $cloudProvider;

        return $obj;
    }

    /**
     * The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $obj = clone $this;
        $obj->cloudProviderRegion = $cloudProviderRegion;

        return $obj;
    }

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    public function withPrimaryCloudAccountID(
        string $primaryCloudAccountID
    ): self {
        $obj = clone $this;
        $obj->primaryCloudAccountID = $primaryCloudAccountID;

        return $obj;
    }

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    public function withBandwidthMbps(float $bandwidthMbps): self
    {
        $obj = clone $this;
        $obj->bandwidthMbps = $bandwidthMbps;

        return $obj;
    }

    /**
     * The authentication key for BGP peer configuration.
     */
    public function withPrimaryBgpKey(string $primaryBgpKey): self
    {
        $obj = clone $this;
        $obj->primaryBgpKey = $primaryBgpKey;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $obj = clone $this;
        $obj->primaryCloudIP = $primaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $obj = clone $this;
        $obj->primaryEnabled = $primaryEnabled;

        return $obj;
    }

    /**
     * Whether the primary BGP route is being announced.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj->primaryRoutingAnnouncement = $primaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withPrimaryTelnyxIP(string $primaryTelnyxIP): self
    {
        $obj = clone $this;
        $obj->primaryTelnyxIP = $primaryTelnyxIP;

        return $obj;
    }

    public function withRegion(Region $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    /**
     * The authentication key for BGP peer configuration.
     */
    public function withSecondaryBgpKey(string $secondaryBgpKey): self
    {
        $obj = clone $this;
        $obj->secondaryBgpKey = $secondaryBgpKey;

        return $obj;
    }

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     */
    public function withSecondaryCloudAccountID(
        string $secondaryCloudAccountID
    ): self {
        $obj = clone $this;
        $obj->secondaryCloudAccountID = $secondaryCloudAccountID;

        return $obj;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $obj = clone $this;
        $obj->secondaryCloudIP = $secondaryCloudIP;

        return $obj;
    }

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withSecondaryEnabled(bool $secondaryEnabled): self
    {
        $obj = clone $this;
        $obj->secondaryEnabled = $secondaryEnabled;

        return $obj;
    }

    /**
     * Whether the secondary BGP route is being announced.
     */
    public function withSecondaryRoutingAnnouncement(
        bool $secondaryRoutingAnnouncement
    ): self {
        $obj = clone $this;
        $obj->secondaryRoutingAnnouncement = $secondaryRoutingAnnouncement;

        return $obj;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withSecondaryTelnyxIP(string $secondaryTelnyxIP): self
    {
        $obj = clone $this;
        $obj->secondaryTelnyxIP = $secondaryTelnyxIP;

        return $obj;
    }
}
