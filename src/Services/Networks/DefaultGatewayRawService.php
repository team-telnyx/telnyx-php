<?php

declare(strict_types=1);

namespace Telnyx\Services\Networks;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Networks\DefaultGateway\DefaultGatewayCreateParams;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Networks\DefaultGatewayRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DefaultGatewayRawService implements DefaultGatewayRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create Default Gateway.
     *
     * @param string $networkIdentifier identifies the resource
     * @param array{wireguardPeerID?: string}|DefaultGatewayCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $networkIdentifier,
        array|DefaultGatewayCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DefaultGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['networks/%1$s/default_gateway', $networkIdentifier],
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultGatewayGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['networks/%1$s/default_gateway', $id],
            options: $requestOptions,
            convert: DefaultGatewayDeleteResponse::class,
        );
    }
}
