<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Networks;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        string $id,
        $wireguardPeerID = omit,
        ?RequestOptions $requestOptions = null,
    ): DefaultGatewayNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DefaultGatewayNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayNewResponse;

    /**
     * @api
     *
     * @return DefaultGatewayGetResponse<HasRawResponse>
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
     * @return DefaultGatewayGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayGetResponse;

    /**
     * @api
     *
     * @return DefaultGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayDeleteResponse;

    /**
     * @api
     *
     * @return DefaultGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayDeleteResponse;
}
