<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardPeersContract;
use Telnyx\WireguardPeers\WireguardPeerCreateParams;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListParams;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateParams;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

final class WireguardPeersService implements WireguardPeersContract
{
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
     *   wireguard_interface_id: string, public_key?: string
     * }|WireguardPeerCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WireguardPeerCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerNewResponse {
        [$parsed, $options] = WireguardPeerCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param array{public_key?: string}|WireguardPeerUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WireguardPeerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerUpdateResponse {
        [$parsed, $options] = WireguardPeerUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     *   filter?: array{wireguard_interface_id?: string},
     *   page?: array{number?: int, size?: int},
     * }|WireguardPeerListParams $params
     *
     * @return DefaultPagination<WireguardPeerListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardPeerListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = WireguardPeerListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireguard_peers',
            query: $parsed,
            options: $options,
            convert: WireguardPeerListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete the WireGuard peer.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerDeleteResponse {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieveConfig(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['wireguard_peers/%1$s/config', $id],
            headers: ['Accept' => 'text/plain'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
