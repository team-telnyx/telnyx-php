<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsContract;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

final class VirtualCrossConnectsService implements VirtualCrossConnectsContract
{
    /**
     * @api
     */
    public VirtualCrossConnectsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VirtualCrossConnectsRawService($client);
    }

    /**
     * @api
     *
     * Create a new Virtual Cross Connect.<br /><br />For AWS and GCE, you have the option of creating the primary connection first and the secondary connection later. You also have the option of disabling the primary and/or secondary connections at any time and later re-enabling them. With Azure, you do not have this option. Azure requires both the primary and secondary connections to be created at the same time and they can not be independantly disabled.
     *
     * @param string $regionCode the region the interface should be deployed to
     * @param float $bandwidthMbps The desired throughput in Megabits per Second (Mbps) for your Virtual Cross Connect.<br /><br />The available bandwidths can be found using the /virtual_cross_connect_regions endpoint.
     * @param float $bgpAsn The Border Gateway Protocol (BGP) Autonomous System Number (ASN). If null, value will be assigned by Telnyx.
     * @param 'aws'|'azure'|'gce'|CloudProvider $cloudProvider the Virtual Private Cloud with which you would like to establish a cross connect
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
     *
     * @throws APIException
     */
    public function create(
        string $regionCode,
        ?float $bandwidthMbps = null,
        ?float $bgpAsn = null,
        string|CloudProvider|null $cloudProvider = null,
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
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectNewResponse {
        $params = Util::removeNulls(
            [
                'regionCode' => $regionCode,
                'bandwidthMbps' => $bandwidthMbps,
                'bgpAsn' => $bgpAsn,
                'cloudProvider' => $cloudProvider,
                'cloudProviderRegion' => $cloudProviderRegion,
                'name' => $name,
                'networkID' => $networkID,
                'primaryBgpKey' => $primaryBgpKey,
                'primaryCloudAccountID' => $primaryCloudAccountID,
                'primaryCloudIP' => $primaryCloudIP,
                'primaryTelnyxIP' => $primaryTelnyxIP,
                'secondaryBgpKey' => $secondaryBgpKey,
                'secondaryCloudAccountID' => $secondaryCloudAccountID,
                'secondaryCloudIP' => $secondaryCloudIP,
                'secondaryTelnyxIP' => $secondaryTelnyxIP,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Virtual Cross Connect.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the Virtual Cross Connect.<br /><br />Cloud IPs can only be patched during the `created` state, as GCE will only inform you of your generated IP once the pending connection requested has been accepted. Once the Virtual Cross Connect has moved to `provisioning`, the IPs can no longer be patched.<br /><br />Once the Virtual Cross Connect has moved to `provisioned` and you are ready to enable routing, you can toggle the routing announcements to `true`.
     *
     * @param string $id identifies the resource
     * @param string $primaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     * @param bool $primaryEnabled Indicates whether the primary circuit is enabled. Setting this to `false` will disable the circuit.
     * @param bool $primaryRoutingAnnouncement whether the primary BGP route is being announced
     * @param string $secondaryCloudIP The IP address assigned for your side of the Virtual Cross Connect.<br /><br />If none is provided, one will be generated for you.<br /><br />This value can not be patched once the VXC has bene provisioned.
     * @param bool $secondaryEnabled Indicates whether the secondary circuit is enabled. Setting this to `false` will disable the circuit.
     * @param bool $secondaryRoutingAnnouncement whether the secondary BGP route is being announced
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
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectUpdateResponse {
        $params = Util::removeNulls(
            [
                'primaryCloudIP' => $primaryCloudIP,
                'primaryEnabled' => $primaryEnabled,
                'primaryRoutingAnnouncement' => $primaryRoutingAnnouncement,
                'secondaryCloudIP' => $secondaryCloudIP,
                'secondaryEnabled' => $secondaryEnabled,
                'secondaryRoutingAnnouncement' => $secondaryRoutingAnnouncement,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Virtual Cross Connects.
     *
     * @param array{
     *   networkID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<VirtualCrossConnectListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Virtual Cross Connect.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
