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
 * @phpstan-import-type RegionShape from \Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse\Data\Region
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   status?: null|InterfaceStatus|value-of<InterfaceStatus>,
 *   regionCode: string,
 *   bandwidthMbps?: float|null,
 *   bgpAsn?: float|null,
 *   cloudProvider?: null|CloudProvider|value-of<CloudProvider>,
 *   cloudProviderRegion?: string|null,
 *   primaryBgpKey?: string|null,
 *   primaryCloudAccountID?: string|null,
 *   primaryCloudIP?: string|null,
 *   primaryEnabled?: bool|null,
 *   primaryRoutingAnnouncement?: bool|null,
 *   primaryTelnyxIP?: string|null,
 *   region?: null|Region|RegionShape,
 *   secondaryBgpKey?: string|null,
 *   secondaryCloudAccountID?: string|null,
 *   secondaryCloudIP?: string|null,
 *   secondaryEnabled?: bool|null,
 *   secondaryRoutingAnnouncement?: bool|null,
 *   secondaryTelnyxIP?: string|null,
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
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id of the network associated with the interface.
     */
    #[Optional('network_id')]
    public ?string $networkID;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

    /**
     * The region interface is deployed to.
     */
    #[Required('region_code')]
    public string $regionCode;

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Optional('bandwidth_mbps')]
    public ?float $bandwidthMbps;

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     */
    #[Optional('bgp_asn')]
    public ?float $bgpAsn;

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @var value-of<CloudProvider>|null $cloudProvider
     */
    #[Optional('cloud_provider', enum: CloudProvider::class)]
    public ?string $cloudProvider;

    /**
     * The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Optional('cloud_provider_region')]
    public ?string $cloudProviderRegion;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Optional('primary_bgp_key')]
    public ?string $primaryBgpKey;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    #[Optional('primary_cloud_account_id')]
    public ?string $primaryCloudAccountID;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Optional('primary_cloud_ip')]
    public ?string $primaryCloudIP;

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Optional('primary_enabled')]
    public ?bool $primaryEnabled;

    /**
     * Whether the primary BGP route is being announced.
     */
    #[Optional('primary_routing_announcement')]
    public ?bool $primaryRoutingAnnouncement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional('primary_telnyx_ip')]
    public ?string $primaryTelnyxIP;

    #[Optional]
    public ?Region $region;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Optional('secondary_bgp_key')]
    public ?string $secondaryBgpKey;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     */
    #[Optional('secondary_cloud_account_id')]
    public ?string $secondaryCloudAccountID;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    #[Optional('secondary_cloud_ip')]
    public ?string $secondaryCloudIP;

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    #[Optional('secondary_enabled')]
    public ?bool $secondaryEnabled;

    /**
     * Whether the secondary BGP route is being announced.
     */
    #[Optional('secondary_routing_announcement')]
    public ?bool $secondaryRoutingAnnouncement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional('secondary_telnyx_ip')]
    public ?string $secondaryTelnyxIP;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(regionCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withRegionCode(...)
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
     * @param InterfaceStatus|value-of<InterfaceStatus>|null $status
     * @param CloudProvider|value-of<CloudProvider>|null $cloudProvider
     * @param Region|RegionShape|null $region
     */
    public static function with(
        string $regionCode,
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $name = null,
        ?string $networkID = null,
        InterfaceStatus|string|null $status = null,
        ?float $bandwidthMbps = null,
        ?float $bgpAsn = null,
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        ?string $primaryBgpKey = null,
        ?string $primaryCloudAccountID = null,
        ?string $primaryCloudIP = null,
        ?bool $primaryEnabled = null,
        ?bool $primaryRoutingAnnouncement = null,
        ?string $primaryTelnyxIP = null,
        Region|array|null $region = null,
        ?string $secondaryBgpKey = null,
        ?string $secondaryCloudAccountID = null,
        ?string $secondaryCloudIP = null,
        ?bool $secondaryEnabled = null,
        ?bool $secondaryRoutingAnnouncement = null,
        ?string $secondaryTelnyxIP = null,
    ): self {
        $self = new self;

        $self['regionCode'] = $regionCode;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $status && $self['status'] = $status;
        null !== $bandwidthMbps && $self['bandwidthMbps'] = $bandwidthMbps;
        null !== $bgpAsn && $self['bgpAsn'] = $bgpAsn;
        null !== $cloudProvider && $self['cloudProvider'] = $cloudProvider;
        null !== $cloudProviderRegion && $self['cloudProviderRegion'] = $cloudProviderRegion;
        null !== $primaryBgpKey && $self['primaryBgpKey'] = $primaryBgpKey;
        null !== $primaryCloudAccountID && $self['primaryCloudAccountID'] = $primaryCloudAccountID;
        null !== $primaryCloudIP && $self['primaryCloudIP'] = $primaryCloudIP;
        null !== $primaryEnabled && $self['primaryEnabled'] = $primaryEnabled;
        null !== $primaryRoutingAnnouncement && $self['primaryRoutingAnnouncement'] = $primaryRoutingAnnouncement;
        null !== $primaryTelnyxIP && $self['primaryTelnyxIP'] = $primaryTelnyxIP;
        null !== $region && $self['region'] = $region;
        null !== $secondaryBgpKey && $self['secondaryBgpKey'] = $secondaryBgpKey;
        null !== $secondaryCloudAccountID && $self['secondaryCloudAccountID'] = $secondaryCloudAccountID;
        null !== $secondaryCloudIP && $self['secondaryCloudIP'] = $secondaryCloudIP;
        null !== $secondaryEnabled && $self['secondaryEnabled'] = $secondaryEnabled;
        null !== $secondaryRoutingAnnouncement && $self['secondaryRoutingAnnouncement'] = $secondaryRoutingAnnouncement;
        null !== $secondaryTelnyxIP && $self['secondaryTelnyxIP'] = $secondaryTelnyxIP;

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
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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

    /**
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $self = clone $this;
        $self['networkID'] = $networkID;

        return $self;
    }

    /**
     * The current status of the interface deployment.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    public function withBandwidthMbps(float $bandwidthMbps): self
    {
        $self = clone $this;
        $self['bandwidthMbps'] = $bandwidthMbps;

        return $self;
    }

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     */
    public function withBgpAsn(float $bgpAsn): self
    {
        $self = clone $this;
        $self['bgpAsn'] = $bgpAsn;

        return $self;
    }

    /**
     * The Virtual Private Cloud with which you would like to establish a cross connect.
     *
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public function withCloudProvider(CloudProvider|string $cloudProvider): self
    {
        $self = clone $this;
        $self['cloudProvider'] = $cloudProvider;

        return $self;
    }

    /**
     * The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $self = clone $this;
        $self['cloudProviderRegion'] = $cloudProviderRegion;

        return $self;
    }

    /**
     * The authentication key for BGP peer configuration.
     */
    public function withPrimaryBgpKey(string $primaryBgpKey): self
    {
        $self = clone $this;
        $self['primaryBgpKey'] = $primaryBgpKey;

        return $self;
    }

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    public function withPrimaryCloudAccountID(
        string $primaryCloudAccountID
    ): self {
        $self = clone $this;
        $self['primaryCloudAccountID'] = $primaryCloudAccountID;

        return $self;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $self = clone $this;
        $self['primaryCloudIP'] = $primaryCloudIP;

        return $self;
    }

    /**
     * Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $self = clone $this;
        $self['primaryEnabled'] = $primaryEnabled;

        return $self;
    }

    /**
     * Whether the primary BGP route is being announced.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $self = clone $this;
        $self['primaryRoutingAnnouncement'] = $primaryRoutingAnnouncement;

        return $self;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withPrimaryTelnyxIP(string $primaryTelnyxIP): self
    {
        $self = clone $this;
        $self['primaryTelnyxIP'] = $primaryTelnyxIP;

        return $self;
    }

    /**
     * @param Region|RegionShape $region
     */
    public function withRegion(Region|array $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * The authentication key for BGP peer configuration.
     */
    public function withSecondaryBgpKey(string $secondaryBgpKey): self
    {
        $self = clone $this;
        $self['secondaryBgpKey'] = $secondaryBgpKey;

        return $self;
    }

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     */
    public function withSecondaryCloudAccountID(
        string $secondaryCloudAccountID
    ): self {
        $self = clone $this;
        $self['secondaryCloudAccountID'] = $secondaryCloudAccountID;

        return $self;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $self = clone $this;
        $self['secondaryCloudIP'] = $secondaryCloudIP;

        return $self;
    }

    /**
     * Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     */
    public function withSecondaryEnabled(bool $secondaryEnabled): self
    {
        $self = clone $this;
        $self['secondaryEnabled'] = $secondaryEnabled;

        return $self;
    }

    /**
     * Whether the secondary BGP route is being announced.
     */
    public function withSecondaryRoutingAnnouncement(
        bool $secondaryRoutingAnnouncement
    ): self {
        $self = clone $this;
        $self['secondaryRoutingAnnouncement'] = $secondaryRoutingAnnouncement;

        return $self;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withSecondaryTelnyxIP(string $secondaryTelnyxIP): self
    {
        $self = clone $this;
        $self['secondaryTelnyxIP'] = $secondaryTelnyxIP;

        return $self;
    }
}
