<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\WireguardPeers\WireguardPeerCreateParams;
use Telnyx\WireguardPeers\WireguardPeerDeleteResponse;
use Telnyx\WireguardPeers\WireguardPeerGetResponse;
use Telnyx\WireguardPeers\WireguardPeerListParams;
use Telnyx\WireguardPeers\WireguardPeerListResponse;
use Telnyx\WireguardPeers\WireguardPeerNewResponse;
use Telnyx\WireguardPeers\WireguardPeerUpdateParams;
use Telnyx\WireguardPeers\WireguardPeerUpdateResponse;

interface WireguardPeersContract
{
    /**
     * @api
     *
     * @param array<mixed>|WireguardPeerCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WireguardPeerCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerNewResponse;

    /**
     * @api
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
     * @param array<mixed>|WireguardPeerUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WireguardPeerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WireguardPeerUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|WireguardPeerListParams $params
     *
     * @return DefaultPagination<WireguardPeerListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardPeerListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
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
     * @throws APIException
     */
    public function retrieveConfig(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
