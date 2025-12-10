<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

interface WireguardPeersContract
{
    /**
     * @api
     *
     * @param string $wireguardInterfaceID the id of the wireguard interface associated with the peer
     * @param string $publicKey The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     *
     * @throws APIException
     */
    public function create(
        string $wireguardInterfaceID,
        ?string $publicKey = null,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $id identifies the resource
     * @param string $publicKey The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $publicKey = null,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   wireguardInterfaceID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[wireguard_interface_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<WireguardPeerListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieveConfig(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
