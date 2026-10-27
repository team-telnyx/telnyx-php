<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NetworkRoutes\NetworkRouteCreateParams;
use Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop;
use Telnyx\NetworkRoutes\NetworkRouteGetResponse;
use Telnyx\NetworkRoutes\NetworkRouteListParams;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Filter;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Page;
use Telnyx\NetworkRoutes\NetworkRouteListParams\Sort;
use Telnyx\NetworkRoutes\NetworkRouteListResponse;
use Telnyx\NetworkRoutes\NetworkRouteNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworkRoutesRawContract;

/**
 * Routes on a Network that send a CIDR to a next hop, such as a tunnel.
 *
 * @phpstan-import-type NextHopShape from \Telnyx\NetworkRoutes\NetworkRouteCreateParams\NextHop
 * @phpstan-import-type FilterShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NetworkRoutes\NetworkRouteListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NetworkRoutesRawService implements NetworkRoutesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds a route to a Network. Traffic on the Network to an address in `cidr` goes via `next_hop`. With a tunnel as the next hop, functions on the Network reach the CIDR through the tunnel without a redeploy. A Network holds each CIDR once.
     *
     * @param array{
     *   cidr: string, networkID: string, nextHop: NextHop|NextHopShape
     * }|NetworkRouteCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkRouteNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NetworkRouteCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkRouteCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'network_routes',
            body: (object) $parsed,
            options: $options,
            convert: NetworkRouteNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a route and its status.
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkRouteGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['network_routes/%1$s', $id],
            options: $requestOptions,
            convert: NetworkRouteGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the routes of the account's Networks. A Network's list is its effective route table: the routes added with `POST /network_routes` (`origin` `static`) and the routes that its attachments install (`origin` `attachment`). Lookup is longest prefix within the Network.
     *
     * @param array{
     *   filter: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|NetworkRouteListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkRouteListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkRouteListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkRouteListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'network_routes',
            query: $parsed,
            options: $options,
            convert: NetworkRouteListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a route that was added with `POST /network_routes`. Traffic to its CIDR stops going via the next hop at once. Routes that an attachment installs (`origin` `attachment`) leave with the attachment and cannot be deleted here.
     *
     * @param string $id the id of the route
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['network_routes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
