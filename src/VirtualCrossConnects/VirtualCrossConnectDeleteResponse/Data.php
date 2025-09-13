<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse\Data\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse\Data\Region;

/**
 * @phpstan-type unnamed_type_with_intersection_parent28 = array{
 *   bgpAsn: float,
 *   cloudProvider: value-of<CloudProvider>,
 *   cloudProviderRegion: string,
 *   primaryCloudAccountID: string,
 *   regionCode: string,
 *   bandwidthMbps?: float,
 *   primaryBgpKey?: string,
 *   primaryCloudIP?: string,
 *   primaryEnabled?: bool,
 *   primaryRoutingAnnouncement?: bool,
 *   primaryTelnyxIP?: string,
 *   recordType?: string,
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
    /** @use SdkModel<unnamed_type_with_intersection_parent28> */
    use SdkModel;

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
     * The region interface is deployed to.
     */
    #[Api('region_code')]
    public string $regionCode;

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

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
     *   regionCode: ...,
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
     *   ->withRegionCode(...)
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
     */
    public static function with(
        float $bgpAsn,
        CloudProvider|string $cloudProvider,
        string $cloudProviderRegion,
        string $primaryCloudAccountID,
        string $regionCode,
        ?float $bandwidthMbps = null,
        ?string $primaryBgpKey = null,
        ?string $primaryCloudIP = null,
        ?bool $primaryEnabled = null,
        ?bool $primaryRoutingAnnouncement = null,
        ?string $primaryTelnyxIP = null,
        ?string $recordType = null,
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
        $obj->regionCode = $regionCode;

        null !== $bandwidthMbps && $obj->bandwidthMbps = $bandwidthMbps;
        null !== $primaryBgpKey && $obj->primaryBgpKey = $primaryBgpKey;
        null !== $primaryCloudIP && $obj->primaryCloudIP = $primaryCloudIP;
        null !== $primaryEnabled && $obj->primaryEnabled = $primaryEnabled;
        null !== $primaryRoutingAnnouncement && $obj->primaryRoutingAnnouncement = $primaryRoutingAnnouncement;
        null !== $primaryTelnyxIP && $obj->primaryTelnyxIP = $primaryTelnyxIP;
        null !== $recordType && $obj->recordType = $recordType;
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
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

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

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

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
