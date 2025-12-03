<?php

declare(strict_types=1);

namespace Telnyx\Services\Networks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Networks\DefaultGateway\DefaultGatewayCreateParams;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Networks\DefaultGatewayContract;

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
     * @param array{wireguard_peer_id?: string}|DefaultGatewayCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|DefaultGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultGatewayNewResponse {
        [$parsed, $options] = DefaultGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
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
     * @throws APIException
     */
    public function delete(
        string $id,
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
