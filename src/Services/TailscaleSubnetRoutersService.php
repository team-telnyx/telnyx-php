<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TailscaleSubnetRoutersContract;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterDeleteResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterGetResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterNewResponse;
use Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterUpdateResponse;

/**
 * Tailscale Subnet Router operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\TailscaleSubnetRouters\TailscaleSubnetRouterListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TailscaleSubnetRoutersService implements TailscaleSubnetRoutersContract
{
    /**
     * @api
     */
    public TailscaleSubnetRoutersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TailscaleSubnetRoutersRawService($client);
    }

    /**
     * @api
     *
     * Creates a Tailscale Subnet Router on a Network and enrolls it in the user's tailnet with the auth key. The response returns the router with `status` `provisioning`. Poll `GET /tailscale_subnet_routers/{id}` until it is `provisioned`. Then approve its routes in the tailnet, unless an auto-approver covers them.
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
    ): TailscaleSubnetRouterNewResponse {
        $params = [
            'advertisedRoutes' => $advertisedRoutes,
            'authKey' => $authKey,
            'name' => $name,
            'networkID' => $networkID,
            'regionCode' => $regionCode,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a single Tailscale Subnet Router by its identifier, including its enrollment state.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TailscaleSubnetRouterGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Renames the router, changes its advertised routes, or retries a failed enrollment. Any change queues a new provisioning run and returns the router with `status` `provisioning`. The router keeps its machine identity on the tailnet. Send an empty object to retry a `failed` router with its stored auth key. Include a new `auth_key` only while the router has never enrolled. The router's Network and region cannot change: create a new router instead.
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
    ): TailscaleSubnetRouterUpdateResponse {
        $params = array_filter(
            [
                'advertisedRoutes' => $advertisedRoutes ?? Omitted::VALUE,
                'authKey' => $authKey ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of the Tailscale Subnet Routers on the account, with support for filtering by Network.
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
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes the router from the Network and logs it out of the tailnet. The response returns the router with `status` `deleting`. The record disappears once removal completes. A machine entry can remain in the tailnet's admin console until it is removed there.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TailscaleSubnetRouterDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
