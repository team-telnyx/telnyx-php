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
 *   bgp_asn: float,
 *   cloud_provider: CloudProvider|value-of<CloudProvider>,
 *   cloud_provider_region: string,
 *   network_id: string,
 *   primary_cloud_account_id: string,
 *   region_code: string,
 *   bandwidth_mbps?: float,
 *   name?: string,
 *   primary_bgp_key?: string,
 *   primary_cloud_ip?: string,
 *   primary_telnyx_ip?: string,
 *   secondary_bgp_key?: string,
 *   secondary_cloud_account_id?: string,
 *   secondary_cloud_ip?: string,
 *   secondary_telnyx_ip?: string,
 * }
 */
final class VirtualCrossConnectCreateParams implements BaseModel
{
    /** @use SdkModel<VirtualCrossConnectCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * The id of the network associated with the interface.
     */
    #[Required]
    public string $network_id;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    #[Required]
    public string $primary_cloud_account_id;

    /**
     * The region the interface should be deployed to.
     */
    #[Required]
    public string $region_code;

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Optional]
    public ?float $bandwidth_mbps;

    /**
     * A user specified name for the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Optional]
    public ?string $primary_bgp_key;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional]
    public ?string $primary_cloud_ip;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional]
    public ?string $primary_telnyx_ip;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional]
    public ?string $secondary_cloud_ip;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Optional]
    public ?string $secondary_telnyx_ip;

    /**
     * `new VirtualCrossConnectCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VirtualCrossConnectCreateParams::with(
     *   bgp_asn: ...,
     *   cloud_provider: ...,
     *   cloud_provider_region: ...,
     *   network_id: ...,
     *   primary_cloud_account_id: ...,
     *   region_code: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VirtualCrossConnectCreateParams)
     *   ->withBgpAsn(...)
     *   ->withCloudProvider(...)
     *   ->withCloudProviderRegion(...)
     *   ->withNetworkID(...)
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
     * @param CloudProvider|value-of<CloudProvider> $cloud_provider
     */
    public static function with(
        float $bgp_asn,
        CloudProvider|string $cloud_provider,
        string $cloud_provider_region,
        string $network_id,
        string $primary_cloud_account_id,
        string $region_code,
        ?float $bandwidth_mbps = null,
        ?string $name = null,
        ?string $primary_bgp_key = null,
        ?string $primary_cloud_ip = null,
        ?string $primary_telnyx_ip = null,
        ?string $secondary_bgp_key = null,
        ?string $secondary_cloud_account_id = null,
        ?string $secondary_cloud_ip = null,
        ?string $secondary_telnyx_ip = null,
    ): self {
        $obj = new self;

        $obj['bgp_asn'] = $bgp_asn;
        $obj['cloud_provider'] = $cloud_provider;
        $obj['cloud_provider_region'] = $cloud_provider_region;
        $obj['network_id'] = $network_id;
        $obj['primary_cloud_account_id'] = $primary_cloud_account_id;
        $obj['region_code'] = $region_code;

        null !== $bandwidth_mbps && $obj['bandwidth_mbps'] = $bandwidth_mbps;
        null !== $name && $obj['name'] = $name;
        null !== $primary_bgp_key && $obj['primary_bgp_key'] = $primary_bgp_key;
        null !== $primary_cloud_ip && $obj['primary_cloud_ip'] = $primary_cloud_ip;
        null !== $primary_telnyx_ip && $obj['primary_telnyx_ip'] = $primary_telnyx_ip;
        null !== $secondary_bgp_key && $obj['secondary_bgp_key'] = $secondary_bgp_key;
        null !== $secondary_cloud_account_id && $obj['secondary_cloud_account_id'] = $secondary_cloud_account_id;
        null !== $secondary_cloud_ip && $obj['secondary_cloud_ip'] = $secondary_cloud_ip;
        null !== $secondary_telnyx_ip && $obj['secondary_telnyx_ip'] = $secondary_telnyx_ip;

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
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj['network_id'] = $networkID;

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
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['region_code'] = $regionCode;

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
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $obj = clone $this;
        $obj['primary_cloud_ip'] = $primaryCloudIP;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $obj = clone $this;
        $obj['secondary_cloud_ip'] = $secondaryCloudIP;

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
