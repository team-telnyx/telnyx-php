<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Tunnels\TunnelGetResponse;
use Telnyx\Tunnels\TunnelListParams\Filter;
use Telnyx\Tunnels\TunnelListParams\Page;
use Telnyx\Tunnels\TunnelListParams\Sort;
use Telnyx\Tunnels\TunnelListResponse;
use Telnyx\Tunnels\TunnelNewResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Tunnels\TunnelListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Tunnels\TunnelListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TunnelsContract
{
    /**
     * @api
     *
     * @param string $name a user specified name for the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): TunnelNewResponse;

    /**
     * @api
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TunnelGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[status]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[after], page[limit]
     * @param Sort|value-of<Sort> $sort Sorts the results by a field, ascending, or descending with a leading `-`. The default is `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): TunnelListResponse;

    /**
     * @api
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
