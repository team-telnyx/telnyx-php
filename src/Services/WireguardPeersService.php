<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        $wireguardInterfaceID,
        $publicKey = omit,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerNewResponse {
        $params = [
            'wireguardInterfaceID' => $wireguardInterfaceID, 'publicKey' => $publicKey,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WireguardPeerNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerNewResponse {
        [$parsed, $options] = WireguardPeerCreateParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return WireguardPeerGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $publicKey = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerUpdateResponse {
        $params = ['publicKey' => $publicKey];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WireguardPeerUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerUpdateResponse {
        [$parsed, $options] = WireguardPeerUpdateParams::parseRequest(
            $params,
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
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WireguardPeerListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerListResponse {
        [$parsed, $options] = WireguardPeerListParams::parseRequest(
            $params,
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return WireguardPeerDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
        $params = [];

        return $this->retrieveConfigRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveConfigRaw(
        string $id,
        mixed $params,
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
