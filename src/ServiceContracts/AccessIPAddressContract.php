<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter;
use Telnyx\AccessIPAddress\AccessIPAddressResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AccessIPAddress\AccessIPAddressListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AccessIPAddressContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $ipAddress,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): AccessIPAddressResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $accessIPAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): AccessIPAddressResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPAddressID,
        RequestOptions|array|null $requestOptions = null,
    ): AccessIPAddressResponse;
}
