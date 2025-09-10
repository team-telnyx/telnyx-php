<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VirtualCrossConnectCreateParams); // set properties as needed
 * $client->virtualCrossConnects->create(...$params->toArray());
 * ```
 * Create a new Virtual Cross Connect.<br /><br />For AWS and GCE, you have the option of creating the primary connection first and the secondary connection later. You also have the option of disabling the primary and/or secondary connections at any time and later re-enabling them. With Azure, you do not have this option. Azure requires both the primary and secondary connections to be created at the same time and they can not be independantly disabled.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->virtualCrossConnects->create(...$params->toArray());`
 *
 * @see Telnyx\VirtualCrossConnects->create
 *
 * @phpstan-type virtual_cross_connect_create_params = array{
 *   bgpAsn: float,
 *   cloudProvider: CloudProvider|value-of<CloudProvider>,
 *   cloudProviderRegion: string,
 *   networkID: string,
 *   primaryCloudAccountID: string,
 *   regionCode: string,
 *   bandwidthMbps?: float,
 *   name?: string,
 *   primaryBgpKey?: string,
 *   primaryCloudIP?: string,
 *   primaryTelnyxIP?: string,
 *   secondaryBgpKey?: string,
 *   secondaryCloudAccountID?: string,
 *   secondaryCloudIP?: string,
 *   secondaryTelnyxIP?: string,
 * }
 */
final class VirtualCrossConnectCreateParams implements BaseModel
{
    /** @use SdkModel<virtual_cross_connect_create_params> */
    use SdkModel;
    use SdkParams;

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
     * The id of the network associated with the interface.
     */
    #[Api('network_id')]
    public string $networkID;

    /**
     * The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     */
    #[Api('primary_cloud_account_id')]
    public string $primaryCloudAccountID;

    /**
     * The region the interface should be deployed to.
     */
    #[Api('region_code')]
    public string $regionCode;

    /**
     * The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     */
    #[Api('bandwidth_mbps', optional: true)]
    public ?float $bandwidthMbps;

    /**
     * A user specified name for the interface.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The authentication key for BGP peer configuration.
     */
    #[Api('primary_bgp_key', optional: true)]
    public ?string $primaryBgpKey;

    /**
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Api('primary_cloud_ip', optional: true)]
    public ?string $primaryCloudIP;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Api('primary_telnyx_ip', optional: true)]
    public ?string $primaryTelnyxIP;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Api('secondary_cloud_ip', optional: true)]
    public ?string $secondaryCloudIP;

    /**
     * The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    #[Api('secondary_telnyx_ip', optional: true)]
    public ?string $secondaryTelnyxIP;

    /**
     * `new VirtualCrossConnectCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VirtualCrossConnectCreateParams::with(
     *   bgpAsn: ...,
     *   cloudProvider: ...,
     *   cloudProviderRegion: ...,
     *   networkID: ...,
     *   primaryCloudAccountID: ...,
     *   regionCode: ...,
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
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider
     */
    public static function with(
        float $bgpAsn,
        CloudProvider|string $cloudProvider,
        string $cloudProviderRegion,
        string $networkID,
        string $primaryCloudAccountID,
        string $regionCode,
        ?float $bandwidthMbps = null,
        ?string $name = null,
        ?string $primaryBgpKey = null,
        ?string $primaryCloudIP = null,
        ?string $primaryTelnyxIP = null,
        ?string $secondaryBgpKey = null,
        ?string $secondaryCloudAccountID = null,
        ?string $secondaryCloudIP = null,
        ?string $secondaryTelnyxIP = null,
    ): self {
        $obj = new self;

        $obj->bgpAsn = $bgpAsn;
        $obj->cloudProvider = $cloudProvider instanceof CloudProvider ? $cloudProvider->value : $cloudProvider;
        $obj->cloudProviderRegion = $cloudProviderRegion;
        $obj->networkID = $networkID;
        $obj->primaryCloudAccountID = $primaryCloudAccountID;
        $obj->regionCode = $regionCode;

        null !== $bandwidthMbps && $obj->bandwidthMbps = $bandwidthMbps;
        null !== $name && $obj->name = $name;
        null !== $primaryBgpKey && $obj->primaryBgpKey = $primaryBgpKey;
        null !== $primaryCloudIP && $obj->primaryCloudIP = $primaryCloudIP;
        null !== $primaryTelnyxIP && $obj->primaryTelnyxIP = $primaryTelnyxIP;
        null !== $secondaryBgpKey && $obj->secondaryBgpKey = $secondaryBgpKey;
        null !== $secondaryCloudAccountID && $obj->secondaryCloudAccountID = $secondaryCloudAccountID;
        null !== $secondaryCloudIP && $obj->secondaryCloudIP = $secondaryCloudIP;
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
     * The id of the network associated with the interface.
     */
    public function withNetworkID(string $networkID): self
    {
        $obj = clone $this;
        $obj->networkID = $networkID;

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
     * The region the interface should be deployed to.
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
     * A user specified name for the interface.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withPrimaryCloudIP(string $primaryCloudIP): self
    {
        $obj = clone $this;
        $obj->primaryCloudIP = $primaryCloudIP;

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
     * The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     */
    public function withSecondaryCloudIP(string $secondaryCloudIP): self
    {
        $obj = clone $this;
        $obj->secondaryCloudIP = $secondaryCloudIP;

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
