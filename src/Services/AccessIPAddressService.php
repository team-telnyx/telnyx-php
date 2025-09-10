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
     */
    public function create(
        $ipAddress,
        $description = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        [$parsed, $options] = AccessIPAddressCreateParams::parseRequest(
            ['ipAddress' => $ipAddress, 'description' => $description],
            $requestOptions,
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
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
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
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressListResponse {
        [$parsed, $options] = AccessIPAddressListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
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
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
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
