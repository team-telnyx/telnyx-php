<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardPeersContract;
use Telnyx\WireguardPeers\WireguardPeerCreateParams;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListParams;
use Telnyx\WireguardPeers\WireguardPeerListParams\Filter;
use Telnyx\WireguardPeers\WireguardPeerListParams\Page;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateParams;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $wireguardInterfaceID the id of the wireguard interface associated with the peer
     * @param string $publicKey The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     *
     * @return WireguardPeerNewResponse<HasRawResponse>
     */
    public function create(
        $wireguardInterfaceID,
        $publicKey = omit,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerNewResponse {
        [$parsed, $options] = WireguardPeerCreateParams::parseRequest(
            [
                'wireguardInterfaceID' => $wireguardInterfaceID,
                'publicKey' => $publicKey,
            ],
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
     * @return WireguardPeerGetResponse<HasRawResponse>
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
     * @param string $publicKey The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     *
     * @return WireguardPeerUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $publicKey = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerUpdateResponse {
        [$parsed, $options] = WireguardPeerUpdateParams::parseRequest(
            ['publicKey' => $publicKey],
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[wireguard_interface_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return WireguardPeerListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerListResponse {
        [$parsed, $options] = WireguardPeerListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return WireguardPeerDeleteResponse<HasRawResponse>
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
