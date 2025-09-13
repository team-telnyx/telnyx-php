<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListParams\Filter;
use Telnyx\WireguardPeers\WireguardPeerListParams\Page;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface WireguardPeersContract
{
    /**
     * @api
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
    ): WireguardPeerNewResponse;

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
    ): WireguardPeerNewResponse;

    /**
     * @api
     *
     * @return WireguardPeerGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerGetResponse;

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
    ): WireguardPeerGetResponse;

    /**
     * @api
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
    ): WireguardPeerUpdateResponse;

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
    ): WireguardPeerUpdateResponse;

    /**
     * @api
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
    ): WireguardPeerListResponse;

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
    ): WireguardPeerListResponse;

    /**
     * @api
     *
     * @return WireguardPeerDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerDeleteResponse;

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
    ): WireguardPeerDeleteResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveConfig(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveConfigRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string;
}
