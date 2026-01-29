<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPAddressContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $ipAddress,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): AccessIPAddressResponse {
        $params = Util::removeNulls(
            ['ipAddress' => $ipAddress, 'description' => $description]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an access IP address
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        RequestOptions|array|null $requestOptions = null
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[ip_source], filter[ip_address], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AccessIPAddressResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete access IP address
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        RequestOptions|array|null $requestOptions = null
    ): AccessIPAddressResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($accessIPAddressID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
