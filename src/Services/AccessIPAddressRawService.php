<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPAddress\AccessIPAddressCreateParams;
use Telnyx\AccessIPAddress\AccessIPAddressListParams;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPAddressRawContract;

final class AccessIPAddressRawService implements AccessIPAddressRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create new Access IP Address
     *
     * @param array{
     *   ipAddress: string, description?: string
     * }|AccessIPAddressCreateParams $params
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPAddressCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccessIPAddressCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'access_ip_address',
            body: (object) $parsed,
            options: $options,
            convert: AccessIPAddressResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve an access IP address
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['access_ip_address/%1$s', $accessIPAddressID],
            options: $requestOptions,
            convert: AccessIPAddressResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Access IP Addresses
     *
     * @param array{
     *   filter?: array{
     *     createdAt?: string|\DateTimeInterface|array{
     *       gt?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lt?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     ipAddress?: string,
     *     ipSource?: string,
     *   },
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|AccessIPAddressListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<AccessIPAddressResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPAddressListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccessIPAddressListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'access_ip_address',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: AccessIPAddressResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete access IP address
     *
     * @return BaseResponse<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['access_ip_address/%1$s', $accessIPAddressID],
            options: $requestOptions,
            convert: AccessIPAddressResponse::class,
        );
    }
}
