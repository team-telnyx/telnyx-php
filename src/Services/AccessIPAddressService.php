<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPAddress\AccessIPAddressListResponse;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPAddressContract;

final class AccessIPAddressService implements AccessIPAddressContract
{
    /**
     * @api
     */
    public AccessIPAddressRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccessIPAddressRawService($client);
    }

    /**
     * @api
     *
     * Create new Access IP Address
     *
     * @throws APIException
     */
    public function create(
        string $ipAddress,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): AccessIPAddressResponse {
        $params = ['ipAddress' => $ipAddress, 'description' => $description];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an access IP address
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($accessIPAddressID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Access IP Addresses
     *
     * @param array{
     *   createdAt?: string|\DateTimeInterface|array{
     *     gt?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lt?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   ipAddress?: string,
     *   ipSource?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): AccessIPAddressListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete access IP address
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        ?RequestOptions $requestOptions = null
    ): AccessIPAddressResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($accessIPAddressID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
