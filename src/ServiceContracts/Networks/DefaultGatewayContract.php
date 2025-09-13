<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Networks;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DefaultGatewayContract
{
    /**
     * @api
     *
     * @param string $wireguardPeerID wireguard peer ID
     *
     * @return DefaultGatewayNewResponse<HasRawResponse>
     */
    public function create(
        string $id,
        $wireguardPeerID = omit,
        ?RequestOptions $requestOptions = null,
    ): DefaultGatewayNewResponse;

    /**
     * @api
     *
     * @return DefaultGatewayGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayGetResponse;

    /**
     * @api
     *
     * @return DefaultGatewayDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayDeleteResponse;
}
