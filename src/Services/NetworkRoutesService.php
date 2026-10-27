<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop;
use Telnyx\NetworkRoutes\NetworkRouteGetResponse;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Page;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Sort;
use Telnyx\NetworkRoutes\NetworkRouteListResponse;
use Telnyx\NetworkRoutes\NetworkRouteNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworkRoutesContract;

/**
 * Routes on a Network that send a CIDR to a next hop, such as a tunnel.
 *
 * @phpstan-import-type NextHopShape from \Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop
 * @phpstan-import-type FilterShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NetworkRoutesService implements NetworkRoutesContract
{
    /**
     * @api
     */
    public NetworkRoutesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NetworkRoutesRawService($client);
    }

    /**
     * @api
     *
     * Adds a route to a Network. Traffic on the Network to an address in `cidr` goes via `next_hop`. With a tunnel as the next hop, functions on the Network reach the CIDR through the tunnel without a redeploy. A Network holds each CIDR once.
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
    ): NetworkRouteNewResponse {
        $params = [
            'cidr' => $cidr, 'networkID' => $networkID, 'nextHop' => $nextHop,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a route and its status.
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NetworkRouteGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the routes of the account's Networks. A Network's list is its effective route table: the routes added with `POST /network_routes` (`origin` `static`) and the routes that its attachments install (`origin` `attachment`). Lookup is longest prefix within the Network.
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
    ): NetworkRouteListResponse {
        $params = array_filter(
            [
                'filter' => $filter,
                'page' => $page ?? Omitted::VALUE,
                'sort' => $sort ?? Omitted::VALUE,
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
     * Deletes a route that was added with `POST /network_routes`. Traffic to its CIDR stops going via the next hop at once. Routes that an attachment installs (`origin` `attachment`) leave with the attachment and cannot be deleted here.
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
