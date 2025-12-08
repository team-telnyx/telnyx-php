<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PublicInternetGatewaysContract;

final class PublicInternetGatewaysService implements PublicInternetGatewaysContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Public Internet Gateway.
     *
     * @param array{
     *   name?: string, network_id?: string, region_code?: string
     * }|PublicInternetGatewayCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PublicInternetGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicInternetGatewayNewResponse {
        [$parsed, $options] = PublicInternetGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicInternetGatewayNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'public_internet_gateways',
            body: (object) $parsed,
            options: $options,
            convert: PublicInternetGatewayNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Public Internet Gateway.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayGetResponse {
        /** @var BaseResponse<PublicInternetGatewayGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Public Internet Gateways.
     *
     * @param array{
     *   filter?: array{network_id?: string}, page?: array{number?: int, size?: int}
     * }|PublicInternetGatewayListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PublicInternetGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PublicInternetGatewayListResponse {
        [$parsed, $options] = PublicInternetGatewayListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicInternetGatewayListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'public_internet_gateways',
            query: $parsed,
            options: $options,
            convert: PublicInternetGatewayListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Public Internet Gateway.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PublicInternetGatewayDeleteResponse {
        /** @var BaseResponse<PublicInternetGatewayDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayDeleteResponse::class,
        );

        return $response->parse();
    }
}
