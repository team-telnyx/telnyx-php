<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Networks\NetworkCreateParams;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesParams;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams;
use Telnyx\Networks\NetworkListParams\Filter;
use Telnyx\Networks\NetworkListParams\Page;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateParams;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworksRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Networks\NetworkListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Networks\NetworkListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\Networks\NetworkListInterfacesParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\Networks\NetworkListInterfacesParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NetworksRawService implements NetworksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Network.
     *
     * @param array{name: string}|NetworkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NetworkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'networks',
            body: (object) $parsed,
            options: $options,
            convert: NetworkNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Network.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkGetResponse>
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
            path: ['networks/%1$s', $id],
            options: $requestOptions,
            convert: NetworkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Network.
     *
     * @param string $networkID identifies the resource
     * @param array{name: string}|NetworkUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $networkID,
        array|NetworkUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['networks/%1$s', $networkID],
            body: (object) $parsed,
            options: $options,
            convert: NetworkUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Networks.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|NetworkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NetworkListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'networks',
            query: $parsed,
            options: $options,
            convert: NetworkListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Network.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkDeleteResponse>
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
            path: ['networks/%1$s', $id],
            options: $requestOptions,
            convert: NetworkDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Interfaces for a Network.
     *
     * @param string $id identifies the resource
     * @param array{
     *   filter?: NetworkListInterfacesParams\Filter|FilterShape1,
     *   page?: NetworkListInterfacesParams\Page|PageShape1,
     * }|NetworkListInterfacesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NetworkListInterfacesResponse>>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        array|NetworkListInterfacesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkListInterfacesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['networks/%1$s/network_interfaces', $id],
            query: $parsed,
            options: $options,
            convert: NetworkListInterfacesResponse::class,
            page: DefaultPagination::class,
        );
    }
}
