<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TunnelsContract;
use Telnyx\Services\Tunnels\ActionsService;
use Telnyx\Tunnels\TunnelGetResponse;
use Telnyx\Tunnels\TunnelListParams\Filter;
use Telnyx\Tunnels\TunnelListParams\Page;
use Telnyx\Tunnels\TunnelListParams\Sort;
use Telnyx\Tunnels\TunnelListResponse;
use Telnyx\Tunnels\TunnelNewResponse;

/**
 * Tunnels connect a Network to hosts behind a tunnel process within the user's network.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Tunnels\TunnelListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Tunnels\TunnelListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TunnelsService implements TunnelsContract
{
    /**
     * @api
     */
    public TunnelsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TunnelsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a tunnel and returns its `tunnel_token`. The token is the only credential the tunnel process needs, and this response and `POST /tunnels/{id}/actions/rotate_token` are the only ones that return it. A new tunnel is `inactive` until a tunnel process connects with the token.
     *
     * @param string $name a user specified name for the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): TunnelNewResponse {
        $params = ['name' => $name];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a tunnel with its status and the tunnel processes connected to it. The response never includes `tunnel_token`.
     *
     * @param string $id the id of the tunnel
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TunnelGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the tunnels on the account with their status and connected tunnel processes. Responses never include `tunnel_token`.
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
    ): TunnelListResponse {
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
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
     * Deletes a tunnel. A tunnel that a route names as its next hop cannot be deleted; delete those routes first. Connected tunnel processes are disconnected and cannot reconnect with the tunnel's token.
     *
     * @param string $id the id of the tunnel
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
