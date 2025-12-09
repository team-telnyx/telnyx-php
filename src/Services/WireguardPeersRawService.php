<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardPeersRawContract;
use Telnyx\WireguardPeers\WireguardPeerCreateParams;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListParams;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateParams;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

final class WireguardPeersRawService implements WireguardPeersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new WireGuard Peer. Current limitation of 5 peers per interface can be created.
     *
     * @param array{
     *   wireguardInterfaceID: string, publicKey?: string
     * }|WireguardPeerCreateParams $params
     *
     * @return BaseResponse<WireguardPeerNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WireguardPeerCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WireguardPeerCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'wireguard_peers',
            body: (object) $parsed,
            options: $options,
            convert: WireguardPeerNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the WireGuard peer.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<WireguardPeerGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['wireguard_peers/%1$s', $id],
            options: $requestOptions,
            convert: WireguardPeerGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the WireGuard peer.
     *
     * @param string $id identifies the resource
     * @param array{publicKey?: string}|WireguardPeerUpdateParams $params
     *
     * @return BaseResponse<WireguardPeerUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WireguardPeerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WireguardPeerUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['wireguard_peers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: WireguardPeerUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all WireGuard peers.
     *
     * @param array{
     *   filter?: array{wireguardInterfaceID?: string},
     *   page?: array{number?: int, size?: int},
     * }|WireguardPeerListParams $params
     *
     * @return BaseResponse<WireguardPeerListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardPeerListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WireguardPeerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'wireguard_peers',
            query: $parsed,
            options: $options,
            convert: WireguardPeerListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete the WireGuard peer.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<WireguardPeerDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['wireguard_peers/%1$s', $id],
            options: $requestOptions,
            convert: WireguardPeerDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve Wireguard config template for Peer
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveConfig(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['wireguard_peers/%1$s/config', $id],
            headers: ['Accept' => 'text/plain'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
