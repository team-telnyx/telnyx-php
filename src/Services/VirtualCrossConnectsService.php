<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsContract;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams\Filter;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams\Page;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

use const Telnyx\Core\OMIT as omit;

final class VirtualCrossConnectsService implements VirtualCrossConnectsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Virtual Cross Connect.<br /><br />For AWS and GCE, you have the option of creating the primary connection first and the secondary connection later. You also have the option of disabling the primary and/or secondary connections at any time and later re-enabling them. With Azure, you do not have this option. Azure requires both the primary and secondary connections to be created at the same time and they can not be independantly disabled.
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
    ): VirtualCrossConnectNewResponse {
        $params = [
            'bgpAsn' => $bgpAsn,
            'cloudProvider' => $cloudProvider,
            'cloudProviderRegion' => $cloudProviderRegion,
            'networkID' => $networkID,
            'primaryCloudAccountID' => $primaryCloudAccountID,
            'regionCode' => $regionCode,
            'bandwidthMbps' => $bandwidthMbps,
            'name' => $name,
            'primaryBgpKey' => $primaryBgpKey,
            'primaryCloudIP' => $primaryCloudIP,
            'primaryTelnyxIP' => $primaryTelnyxIP,
            'secondaryBgpKey' => $secondaryBgpKey,
            'secondaryCloudAccountID' => $secondaryCloudAccountID,
            'secondaryCloudIP' => $secondaryCloudIP,
            'secondaryTelnyxIP' => $secondaryTelnyxIP,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectNewResponse {
        [$parsed, $options] = VirtualCrossConnectCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'virtual_cross_connects',
            body: (object) $parsed,
            options: $options,
            convert: VirtualCrossConnectNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Virtual Cross Connect.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['virtual_cross_connects/%1$s', $id],
            options: $requestOptions,
            convert: VirtualCrossConnectGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the Virtual Cross Connect.<br /><br />Cloud IPs can only be patched during the `created` state, as GCE will only inform you of your generated IP once the pending connection requested has been accepted. Once the Virtual Cross Connect has moved to `provisioning`, the IPs can no longer be patched.<br /><br />Once the Virtual Cross Connect has moved to `provisioned` and you are ready to enable routing, you can toggle the routing announcements to `true`.
     *
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
        $primaryCloudIP = omit,
        $primaryEnabled = omit,
        $primaryRoutingAnnouncement = omit,
        $secondaryCloudIP = omit,
        $secondaryEnabled = omit,
        $secondaryRoutingAnnouncement = omit,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectUpdateResponse {
        $params = [
            'primaryCloudIP' => $primaryCloudIP,
            'primaryEnabled' => $primaryEnabled,
            'primaryRoutingAnnouncement' => $primaryRoutingAnnouncement,
            'secondaryCloudIP' => $secondaryCloudIP,
            'secondaryEnabled' => $secondaryEnabled,
            'secondaryRoutingAnnouncement' => $secondaryRoutingAnnouncement,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectUpdateResponse {
        [$parsed, $options] = VirtualCrossConnectUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['virtual_cross_connects/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: VirtualCrossConnectUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Virtual Cross Connects.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectListResponse {
        [$parsed, $options] = VirtualCrossConnectListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'virtual_cross_connects',
            query: $parsed,
            options: $options,
            convert: VirtualCrossConnectListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Virtual Cross Connect.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VirtualCrossConnectDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['virtual_cross_connects/%1$s', $id],
            options: $requestOptions,
            convert: VirtualCrossConnectDeleteResponse::class,
        );
    }
}
