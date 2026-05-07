<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Region;

/**
 * @phpstan-import-type RegionShape from \Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse\Region
 *
 * @phpstan-type VirtualCrossConnectListResponseShape = array{
 *   id?: string|null,
 *   bandwidthMbps?: float|null,
 *   bgpAsn?: float|null,
 *   cloudProvider?: null|CloudProvider|value-of<CloudProvider>,
 *   cloudProviderRegion?: string|null,
 *   createdAt?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   primaryBgpKey?: string|null,
 *   primaryCloudAccountID?: string|null,
 *   primaryCloudIP?: string|null,
 *   primaryEnabled?: bool|null,
 *   primaryRoutingAnnouncement?: bool|null,
 *   primaryTelnyxIP?: string|null,
 *   recordType?: string|null,
 *   region?: null|Region|RegionShape,
 *   regionCode?: string|null,
 *   status?: null|InterfaceStatus|value-of<InterfaceStatus>,
 *   updatedAt?: string|null,
 * }
 */
final class VirtualCrossConnectListResponse implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectListResponseShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     */
    #[Optional('bandwidth_mbps')]
    public ?float $bandwidthMbps;

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN).
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
     * The region where your Virtual Private Cloud hosts are located.
     */
    #[Optional('cloud_provider_region')]
    public ?string $cloudProviderRegion;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

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
     * The authentication key for BGP peer configuration.
     */
    #[Optional('primary_bgp_key')]
    public ?string $primaryBgpKey;

    /**
     * The identifier for your Virtual Private Cloud.
     */
    #[Optional('primary_cloud_account_id')]
    public ?string $primaryCloudAccountID;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.
     */
    #[Optional('primary_cloud_ip')]
    public ?string $primaryCloudIP;

    /**
     * Indicates whether the primary circuit is enabled.
     */
    #[Optional('primary_enabled')]
    public ?bool $primaryEnabled;

    /**
     * Whether.
     */
    #[Optional('primary_routing_announcement')]
    public ?bool $primaryRoutingAnnouncement;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.
     */
    #[Optional('primary_telnyx_ip')]
    public ?string $primaryTelnyxIP;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    /**
     * The current status of the interface deployment.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

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
     * @param CloudProvider|value-of<CloudProvider>|null $cloudProvider
     * @param Region|RegionShape|null $region
     * @param InterfaceStatus|value-of<InterfaceStatus>|null $status
     */
    public static function with(
        ?string $id = null,
        ?float $bandwidthMbps = null,
        ?float $bgpAsn = null,
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        ?string $createdAt = null,
        ?string $name = null,
        ?string $networkID = null,
        ?string $primaryBgpKey = null,
        ?string $primaryCloudAccountID = null,
        ?string $primaryCloudIP = null,
        ?bool $primaryEnabled = null,
        ?bool $primaryRoutingAnnouncement = null,
        ?string $primaryTelnyxIP = null,
        ?string $recordType = null,
        Region|array|null $region = null,
        ?string $regionCode = null,
        InterfaceStatus|string|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bandwidthMbps && $self['bandwidthMbps'] = $bandwidthMbps;
        null !== $bgpAsn && $self['bgpAsn'] = $bgpAsn;
        null !== $cloudProvider && $self['cloudProvider'] = $cloudProvider;
        null !== $cloudProviderRegion && $self['cloudProviderRegion'] = $cloudProviderRegion;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $primaryBgpKey && $self['primaryBgpKey'] = $primaryBgpKey;
        null !== $primaryCloudAccountID && $self['primaryCloudAccountID'] = $primaryCloudAccountID;
        null !== $primaryCloudIP && $self['primaryCloudIP'] = $primaryCloudIP;
        null !== $primaryEnabled && $self['primaryEnabled'] = $primaryEnabled;
        null !== $primaryRoutingAnnouncement && $self['primaryRoutingAnnouncement'] = $primaryRoutingAnnouncement;
        null !== $primaryTelnyxIP && $self['primaryTelnyxIP'] = $primaryTelnyxIP;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $region && $self['region'] = $region;
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
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.
     */
    public function withBandwidthMbps(float $bandwidthMbps): self
    {
        $self = clone $this;
        $self['bandwidthMbps'] = $bandwidthMbps;

        return $self;
    }

    /**
     * The Border Gateway Protocol (BGP) Autonomous System Number (ASN).
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
     * The region where your Virtual Private Cloud hosts are located.
     */
    public function withCloudProviderRegion(string $cloudProviderRegion): self
    {
        $self = clone $this;
        $self['cloudProviderRegion'] = $cloudProviderRegion;

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
     * The authentication key for BGP peer configuration.
     */
    public function withPrimaryBgpKey(string $primaryBgpKey): self
    {
        $self = clone $this;
        $self['primaryBgpKey'] = $primaryBgpKey;

        return $self;
    }

    /**
     * The identifier for your Virtual Private Cloud.
     */
    public function withPrimaryCloudAccountID(
        string $primaryCloudAccountID
    ): self {
        $self = clone $this;
        $self['primaryCloudAccountID'] = $primaryCloudAccountID;

        return $self;
    }

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $self = clone $this;
        $self['primaryCloudIP'] = $primaryCloudIP;

        return $self;
    }

    /**
     * Indicates whether the primary circuit is enabled.
     */
    public function withPrimaryEnabled(bool $primaryEnabled): self
    {
        $self = clone $this;
        $self['primaryEnabled'] = $primaryEnabled;

        return $self;
    }

    /**
     * Whether.
     */
    public function withPrimaryRoutingAnnouncement(
        bool $primaryRoutingAnnouncement
    ): self {
        $self = clone $this;
        $self['primaryRoutingAnnouncement'] = $primaryRoutingAnnouncement;

        return $self;
    }

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.
     */
    public function withPrimaryTelnyxIP(string $primaryTelnyxIP): self
    {
        $self = clone $this;
        $self['primaryTelnyxIP'] = $primaryTelnyxIP;

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
     * @param Region|RegionShape $region
     */
    public function withRegion(Region|array $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

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
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
