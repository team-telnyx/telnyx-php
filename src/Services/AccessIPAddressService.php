<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPAddress\AccessIPAddressCreateParams;
use Telnyx\AccessIPAddress\AccessIPAddressListParams;
use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter;
use Telnyx\AccessIPAddress\AccessIPAddressListParams\Page;
use Telnyx\AccessIPAddress\AccessIPAddressListResponse;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPAddressContract;

use const Telnyx\Core\OMIT as omit;

final class AccessIPAddressService implements AccessIPAddressContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create new Access IP Address
     *
     * @param string $ipAddress
     * @param string $description
     *
     * @return AccessIPAddressResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $ipAddress,
        $description = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        $params = ['ipAddress' => $ipAddress, 'description' => $description];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AccessIPAddressResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        [$parsed, $options] = AccessIPAddressCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return AccessIPAddressResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        $params = [];

        return $this->retrieveRaw($accessIPAddressID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return AccessIPAddressResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $accessIPAddressID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPAddressResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return AccessIPAddressListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AccessIPAddressListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressListResponse {
        [$parsed, $options] = AccessIPAddressListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'access_ip_address',
            query: $parsed,
            options: $options,
            convert: AccessIPAddressListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete access IP address
     *
     * @return AccessIPAddressResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        $params = [];

        return $this->deleteRaw($accessIPAddressID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return AccessIPAddressResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $accessIPAddressID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPAddressResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['access_ip_address/%1$s', $accessIPAddressID],
            options: $requestOptions,
            convert: AccessIPAddressResponse::class,
        );
    }
}
