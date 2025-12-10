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
use Telnyx\ServiceContracts\PublicInternetGatewaysRawContract;

final class PublicInternetGatewaysRawService implements PublicInternetGatewaysRawContract
{
    // @phpstan-ignore-next-line
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
     *   name?: string, networkID?: string, regionCode?: string
     * }|PublicInternetGatewayCreateParams $params
     *
     * @return BaseResponse<PublicInternetGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PublicInternetGatewayCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PublicInternetGatewayCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'public_internet_gateways',
            body: (object) $parsed,
            options: $options,
            convert: PublicInternetGatewayNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Public Internet Gateway.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<PublicInternetGatewayGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Public Internet Gateways.
     *
     * @param array{
     *   filter?: array{networkID?: string}, page?: array{number?: int, size?: int}
     * }|PublicInternetGatewayListParams $params
     *
     * @return BaseResponse<PublicInternetGatewayListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PublicInternetGatewayListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PublicInternetGatewayListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'public_internet_gateways',
            query: $parsed,
            options: $options,
            convert: PublicInternetGatewayListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Public Internet Gateway.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<PublicInternetGatewayDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayDeleteResponse::class,
        );
    }
}
