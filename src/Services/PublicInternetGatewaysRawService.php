<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PublicInternetGatewaysRawContract;

/**
 * Public Internet Gateway operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicInternetGatewayNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PublicInternetGatewayCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicInternetGatewayGetResponse>
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|PublicInternetGatewayListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PublicInternetGatewayListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PublicInternetGatewayListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PublicInternetGatewayListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'public_internet_gateways',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PublicInternetGatewayListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Public Internet Gateway.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicInternetGatewayDeleteResponse>
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
            path: ['public_internet_gateways/%1$s', $id],
            options: $requestOptions,
            convert: PublicInternetGatewayDeleteResponse::class,
        );
    }
}
