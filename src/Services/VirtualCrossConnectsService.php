<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsContract;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectCreateParams\CloudProvider;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectDeleteResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectListResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectNewResponse;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateParams;
use Telnyx\VirtualCrossConnects\VirtualCrossConnectUpdateResponse;

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
     * @param array{
     *   bgpAsn: float,
     *   cloudProvider: 'aws'|'azure'|'gce'|CloudProvider,
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
     * }|VirtualCrossConnectCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VirtualCrossConnectCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectNewResponse {
        [$parsed, $options] = VirtualCrossConnectCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VirtualCrossConnectNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'virtual_cross_connects',
            body: (object) $parsed,
            options: $options,
            convert: VirtualCrossConnectNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<VirtualCrossConnectGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['virtual_cross_connects/%1$s', $id],
            options: $requestOptions,
            convert: VirtualCrossConnectGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the Virtual Cross Connect.<br /><br />Cloud IPs can only be patched during the `created` state, as GCE will only inform you of your generated IP once the pending connection requested has been accepted. Once the Virtual Cross Connect has moved to `provisioning`, the IPs can no longer be patched.<br /><br />Once the Virtual Cross Connect has moved to `provisioned` and you are ready to enable routing, you can toggle the routing announcements to `true`.
     *
     * @param array{
     *   primaryCloudIP?: string,
     *   primaryEnabled?: bool,
     *   primaryRoutingAnnouncement?: bool,
     *   secondaryCloudIP?: string,
     *   secondaryEnabled?: bool,
     *   secondaryRoutingAnnouncement?: bool,
     * }|VirtualCrossConnectUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|VirtualCrossConnectUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectUpdateResponse {
        [$parsed, $options] = VirtualCrossConnectUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VirtualCrossConnectUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['virtual_cross_connects/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: VirtualCrossConnectUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Virtual Cross Connects.
     *
     * @param array{
     *   filter?: array{networkID?: string}, page?: array{number?: int, size?: int}
     * }|VirtualCrossConnectListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectListResponse {
        [$parsed, $options] = VirtualCrossConnectListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VirtualCrossConnectListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'virtual_cross_connects',
            query: $parsed,
            options: $options,
            convert: VirtualCrossConnectListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<VirtualCrossConnectDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['virtual_cross_connects/%1$s', $id],
            options: $requestOptions,
            convert: VirtualCrossConnectDeleteResponse::class,
        );

        return $response->parse();
    }
}
