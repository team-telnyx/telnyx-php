<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Networks;

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
     */
    public function create(
        string $id,
        $wireguardPeerID = omit,
        ?RequestOptions $requestOptions = null,
    ): DefaultGatewayNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayGetResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayDeleteResponse;
}
