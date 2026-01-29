<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams\Filter;
use Telnyx\Networks\NetworkListParams\Page;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworksContract;
use Telnyx\Services\Networks\DefaultGatewayService;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Networks\NetworkListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Networks\NetworkListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\Networks\NetworkListInterfacesParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\Networks\NetworkListInterfacesParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NetworksService implements NetworksContract
{
    /**
     * @api
     */
    public NetworksRawService $raw;

    /**
     * @api
     */
    public DefaultGatewayService $defaultGateway;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NetworksRawService($client);
        $this->defaultGateway = new DefaultGatewayService($client);
    }

    /**
     * @api
     *
     * Create a new Network.
     *
     * @param string $name a user specified name for the network
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): NetworkNewResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Network.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NetworkGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Network.
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
    ): NetworkUpdateResponse {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($networkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Networks.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NetworkListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Network.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): NetworkDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Interfaces for a Network.
     *
     * @param string $id identifies the resource
     * @param \Telnyx\Networks\NetworkListInterfacesParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status]
     * @param \Telnyx\Networks\NetworkListInterfacesParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<NetworkListInterfacesResponse>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        \Telnyx\Networks\NetworkListInterfacesParams\Filter|array|null $filter = null,
        \Telnyx\Networks\NetworkListInterfacesParams\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listInterfaces($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
