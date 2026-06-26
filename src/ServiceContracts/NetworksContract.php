<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams\Filter;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Networks\NetworkListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\Networks\NetworkListInterfacesParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NetworksContract
{
    /**
     * @api
     *
     * @param string $name a user specified name for the network
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): NetworkNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NetworkGetResponse;

    /**
     * @api
     *
     * @param string $networkID identifies the resource
     * @param string $name a user specified name for the network
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $networkID,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): NetworkUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NetworkListResponse>
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NetworkDeleteResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param \Telnyx\Networks\NetworkListInterfacesParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NetworkListInterfacesResponse>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        \Telnyx\Networks\NetworkListInterfacesParams\Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
