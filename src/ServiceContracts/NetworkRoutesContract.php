<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop;
use Telnyx\NetworkRoutes\NetworkRouteGetResponse;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Page;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Sort;
use Telnyx\NetworkRoutes\NetworkRouteListResponse;
use Telnyx\NetworkRoutes\NetworkRouteNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type NextHopShape from \Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop
 * @phpstan-import-type FilterShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NetworkRoutesContract
{
    /**
     * @api
     *
     * @param string $cidr The IPv4 subnet to route, such as a subnet behind the tunnel. It must be a canonical CIDR. Default, loopback, link-local, multicast, and shared address space (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the Tailscale Subnet Router ranges, `172.27.254.0/24` and `198.18.0.0/20`, or a subnet already on the Network.
     * @param string $networkID the id of the Network to add the route to
     * @param NextHop|NextHopShape $nextHop where the Network sends traffic for `cidr`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $cidr,
        string $networkID,
        NextHop|array $nextHop,
        RequestOptions|array|null $requestOptions = null,
    ): NetworkRouteNewResponse;

    /**
     * @api
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NetworkRouteGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id], filter[origin], filter[next_hop.type], filter[cidr], filter[status]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[after], page[limit]
     * @param Sort|value-of<Sort> $sort Sorts the results by a field, ascending, or descending with a leading `-`. The default is `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array $filter,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): NetworkRouteListResponse;

    /**
     * @api
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
