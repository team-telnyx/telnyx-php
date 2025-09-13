<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams\Filter;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams\Page;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface VirtualCrossConnectsContract
{
    /**
     * @api
     *
     * @param float $bgpAsn The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     * @param CloudProvider|value-of<CloudProvider> $cloudProvider the Virtual Private Cloud with which you would like to establish a cross connect
     * @param string $cloudProviderRegion The region where your Virtual Private Cloud hosts are located.<br /><br />The available regions can be found using the /virtual_cross_connect_regions endpoint.
     * @param string $networkID the id of the network associated with the interface
     * @param string $primaryCloudAccountID The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.
     * @param string $regionCode the region the interface should be deployed to
     * @param float $bandwidthMbps The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     * @param string $name a user specified name for the interface
     * @param string $primaryBgpKey the authentication key for BGP peer configuration
     * @param string $primaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param string $primaryTelnyxIP The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param string $secondaryBgpKey the authentication key for BGP peer configuration
     * @param string $secondaryCloudAccountID The identifier for your Virtual Private Cloud. The number will be different based upon your Cloud provider.<br /><br />This attribute is only necessary for GCE.
     * @param string $secondaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     * @param string $secondaryTelnyxIP The IP address assigned to the Telnyx side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value should be null for GCE as Google will only inform you of your assigned IP once the connection has been accepted.
     *
     * @return VirtualCrossConnectNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $bgpAsn,
        $cloudProvider,
        $cloudProviderRegion,
        $networkID,
        $primaryCloudAccountID,
        $regionCode,
        $bandwidthMbps = omit,
        $name = omit,
        $primaryBgpKey = omit,
        $primaryCloudIP = omit,
        $primaryTelnyxIP = omit,
        $secondaryBgpKey = omit,
        $secondaryCloudAccountID = omit,
        $secondaryCloudIP = omit,
        $secondaryTelnyxIP = omit,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VirtualCrossConnectNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectNewResponse;

    /**
     * @api
     *
     * @return VirtualCrossConnectGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectGetResponse;

    /**
     * @api
     *
     * @return VirtualCrossConnectGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectGetResponse;

    /**
     * @api
     *
     * @param string $primaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     * @param bool $primaryEnabled Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     * @param bool $primaryRoutingAnnouncement whether the primary BGP route is being announced
     * @param string $secondaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     * @param bool $secondaryEnabled Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     * @param bool $secondaryRoutingAnnouncement whether the secondary BGP route is being announced
     *
     * @return VirtualCrossConnectUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $primaryCloudIP = omit,
        $primaryEnabled = omit,
        $primaryRoutingAnnouncement = omit,
        $secondaryCloudIP = omit,
        $secondaryEnabled = omit,
        $secondaryRoutingAnnouncement = omit,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VirtualCrossConnectUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return VirtualCrossConnectListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VirtualCrossConnectListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectListResponse;

    /**
     * @api
     *
     * @return VirtualCrossConnectDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectDeleteResponse;

    /**
     * @api
     *
     * @return VirtualCrossConnectDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectDeleteResponse;
}
