<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Networks;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;

interface DefaultGatewayContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $wireguardPeerID wireguard peer ID
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?string $wireguardPeerID = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultGatewayNewResponse;

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
    ): DefaultGatewayGetResponse;

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
    ): DefaultGatewayDeleteResponse;
}
