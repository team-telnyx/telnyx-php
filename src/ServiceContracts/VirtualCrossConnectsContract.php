<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams\Filter;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VirtualCrossConnectsContract
{
    /**
     * @api
     *
     * @param string $regionCode the region the interface should be deployed to
     * @param float $bandwidthMbps The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     * @param float $bgpAsn The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider the Virtual Private Cloud with which you would like to establish a cross connect
     * @param string $cloudProviderRegion The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     * @param string $name a user specified name for the interface
     * @param string $networkID the id of the network associated with the interface
     * @param string $primaryBgpKey the authentication key for BGP peer configuration
     * @param string $primaryCloudAccountID The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     * @param string $primaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param string $primaryTelnyxIP The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param string $secondaryBgpKey the authentication key for BGP peer configuration
     * @param string $secondaryCloudAccountID The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     * @param string $secondaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param string $secondaryTelnyxIP The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
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
        RequestOptions|array|null $requestOptions = null,
    ): VirtualCrossConnectNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VirtualCrossConnectGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $primaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     * @param bool $primaryEnabled Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     * @param bool $primaryRoutingAnnouncement whether the primary BGP route is being announced
     * @param string $secondaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     * @param bool $secondaryEnabled Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     * @param bool $secondaryRoutingAnnouncement whether the secondary BGP route is being announced
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $primaryCloudIP = null,
        ?bool $primaryEnabled = null,
        ?bool $primaryRoutingAnnouncement = null,
        ?string $secondaryCloudIP = null,
        ?bool $secondaryEnabled = null,
        ?bool $secondaryRoutingAnnouncement = null,
        RequestOptions|array|null $requestOptions = null,
    ): VirtualCrossConnectUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VirtualCrossConnectListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): VirtualCrossConnectDeleteResponse;
}
