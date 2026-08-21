<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams\Body;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayRead;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PublicInternetGatewaysRawContract;

/**
 * Public Internet Gateway operations.
 *
 * @phpstan-import-type BodyShape from \Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams\Body
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
     * Requests creation of a public internet gateway on the specified network, giving the network internet egress. Creation is asynchronous, so the request is accepted and completes in the background.
     *
     * @param array{body: Body|BodyShape}|PublicInternetGatewayCreateParams $params
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
            body: (object) $parsed['body'],
            options: $options,
            convert: PublicInternetGatewayNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the details of a single public internet gateway by its identifier.
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
     * Returns a paginated list of the public internet gateways on your account, with support for filtering.
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|PublicInternetGatewayListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PublicInternetGatewayRead>>
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
            convert: PublicInternetGatewayRead::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the specified public internet gateway, removing internet egress through it.
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
