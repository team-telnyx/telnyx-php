<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
     */
    public function create(
        $wireguardInterfaceID,
        $publicKey = omit,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerGetResponse;

    /**
     * @api
     *
     * @param string $publicKey The WireGuard `PublicKey`.<br /><br />If you do not provide a Public Key, a new Public and Private key pair will be generated for you.
     */
    public function update(
        string $id,
        $publicKey = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[wireguard_interface_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardPeerDeleteResponse;

    /**
     * @api
     */
    public function retrieveConfig(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
