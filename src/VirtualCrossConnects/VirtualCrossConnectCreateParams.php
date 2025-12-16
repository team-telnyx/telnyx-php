<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;

/**
 * Create a new Virtual Cross Connect.<br /><br />For AWS and GCE, you have the option of creating the primary connection first and the secondary connection later. You also have the option of disabling the primary and/or secondary connections at any time and later re-enabling them. With Azure, you do not have this option. Azure requires both the primary and secondary connections to be created at the same time and they can not be independantly disabled.
 *
 * @see Telnyx\Services\VirtualCrossConnectsService::create()
 *
 * @phpstan-type VirtualCrossConnectCreateParamsShape = array{
 *   regionCode: string,
 *   bandwidthMbps?: float|null,
 *   bgpAsn?: float|null,
 *   cloudProvider?: null|CloudProvider|value-of<CloudProvider>,
 *   cloudProviderRegion?: string|null,
 *   name?: string|null,
 *   networkID?: string|null,
 *   primaryBgpKey?: string|null,
 *   primaryCloudAccountID?: string|null,
 *   primaryCloudIP?: string|null,
 *   primaryTelnyxIP?: string|null,
 *   secondaryBgpKey?: string|null,
 *   secondaryCloudAccountID?: string|null,
 *   secondaryCloudIP?: string|null,
 *   secondaryTelnyxIP?: string|null,
 * }
 */
final class VirtualCrossConnectCreateParams implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The region the interface should be deployed to.
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
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    #[Optional('primary_cloud_account_id')]
    public ?string $primaryCloudAccountID;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional('primary_cloud_ip')]
    public ?string $primaryCloudIP;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional('primary_telnyx_ip')]
    public ?string $primaryTelnyxIP;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional('secondary_cloud_ip')]
    public ?string $secondaryCloudIP;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional('secondary_telnyx_ip')]
    public ?string $secondaryTelnyxIP;

    /**
     * `new VirtualCrossConnectCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VirtualCrossConnectCreateParams::with(regionCode: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VirtualCrossConnectCreateParams)->withRegionCode(...)
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
        string $regionCode,
        ?float $bandwidthMbps = null,
        ?float $bgpAsn = null,
        CloudProvider|string|null $cloudProvider = null,
        ?string $cloudProviderRegion = null,
        ?string $name = null,
        ?string $networkID = null,
        ?string $primaryBgpKey = null,
        ?string $primaryCloudAccountID = null,
        ?string $primaryCloudIP = null,
        ?string $primaryTelnyxIP = null,
        ?string $secondaryBgpKey = null,
        ?string $secondaryCloudAccountID = null,
        ?string $secondaryCloudIP = null,
        ?string $secondaryTelnyxIP = null,
    ): self {
        $self = new self;

        $self['regionCode'] = $regionCode;

        null !== $bandwidthMbps && $self['bandwidthMbps'] = $bandwidthMbps;
        null !== $bgpAsn && $self['bgpAsn'] = $bgpAsn;
        null !== $cloudProvider && $self['cloudProvider'] = $cloudProvider;
        null !== $cloudProviderRegion && $self['cloudProviderRegion'] = $cloudProviderRegion;
        null !== $name && $self['name'] = $name;
        null !== $networkID && $self['networkID'] = $networkID;
        null !== $primaryBgpKey && $self['primaryBgpKey'] = $primaryBgpKey;
        null !== $primaryCloudAccountID && $self['primaryCloudAccountID'] = $primaryCloudAccountID;
        null !== $primaryCloudIP && $self['primaryCloudIP'] = $primaryCloudIP;
        null !== $primaryTelnyxIP && $self['primaryTelnyxIP'] = $primaryTelnyxIP;
        null !== $secondaryBgpKey && $self['secondaryBgpKey'] = $secondaryBgpKey;
        null !== $secondaryCloudAccountID && $self['secondaryCloudAccountID'] = $secondaryCloudAccountID;
        null !== $secondaryCloudIP && $self['secondaryCloudIP'] = $secondaryCloudIP;
        null !== $secondaryTelnyxIP && $self['secondaryTelnyxIP'] = $secondaryTelnyxIP;

        return $self;
    }

    /**
     * The region the interface should be deployed to.
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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $self = clone $this;
        $self['primaryCloudIP'] = $primaryCloudIP;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $self = clone $this;
        $self['secondaryCloudIP'] = $secondaryCloudIP;

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
