<?php

declare(strict_types=1);

namespace Telnyx\Services\Networks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayCreateParams;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Networks\DefaultGatewayContract;

use const Telnyx\Core\OMIT as omit;

final class DefaultGatewayService implements DefaultGatewayContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create Default Gateway.
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
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayNewResponse {
        $params = ['wireguardPeerID' => $wireguardPeerID];

        return $this->createRaw($id, $params, $requestOptions);
    }

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
    ): DefaultGatewayNewResponse {
        [$parsed, $options] = DefaultGatewayCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['networks/%1$s/default_gateway', $id],
            body: (object) $parsed,
            options: $options,
            convert: DefaultGatewayNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get Default Gateway status.
     *
     * @return DefaultGatewayGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

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
    ): DefaultGatewayGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['networks/%1$s/default_gateway', $id],
            options: $requestOptions,
            convert: DefaultGatewayGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Default Gateway.
     *
     * @return DefaultGatewayDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

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
    ): DefaultGatewayDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['networks/%1$s/default_gateway', $id],
            options: $requestOptions,
            convert: DefaultGatewayDeleteResponse::class,
        );
    }
}
