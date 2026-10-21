<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterDeleteResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterGetResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterNewResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TailscaleSubnetRoutersContract
{
    /**
     * @api
     *
     * @param list<string> $advertisedRoutes IPv4 subnets of the Network that the router advertises to the tailnet. Each entry is a canonical CIDR that the Network routes. Default, loopback, link-local, multicast, and Tailscale (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the router's own, `172.27.254.0/24` and `198.18.0.0/20`.
     * @param string $authKey A Tailscale auth key that enrolls the router in the user's tailnet: reusable, pre-approved, tagged, and not ephemeral. Telnyx stores it encrypted until enrollment succeeds, then discards it. It is never returned.
     * @param string $name a user specified name for the router
     * @param string $networkID the id of the Network to attach the router to
     * @param string $regionCode The code of the region to create the router in. `GET /network_coverage` lists the regions whose `available_services` include `tailscale_subnet_router`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $advertisedRoutes,
        string $authKey,
        string $name,
        string $networkID,
        string $regionCode,
        RequestOptions|array|null $requestOptions = null,
    ): TailscaleSubnetRouterNewResponse;

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
    ): TailscaleSubnetRouterGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param list<string> $advertisedRoutes IPv4 subnets of the Network that the router advertises to the tailnet. Each entry is a canonical CIDR that the Network routes. Default, loopback, link-local, multicast, and Tailscale (`100.64.0.0/10`) ranges are rejected. So are ranges that overlap the router's own, `172.27.254.0/24` and `198.18.0.0/20`.
     * @param string $authKey A replacement Tailscale auth key. Accepted only while the router has never enrolled, for example after a `failed` enrollment. Never returned.
     * @param string $name a user specified name for the router
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $advertisedRoutes = null,
        ?string $authKey = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): TailscaleSubnetRouterUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TailscaleSubnetRouter>
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
    ): TailscaleSubnetRouterDeleteResponse;
}
