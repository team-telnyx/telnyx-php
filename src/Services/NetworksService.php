<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Networks\NetworkCreateParams;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesParams;
use Telnyx\Networks\NetworkListInterfacesParams\Filter as Filter1;
use Telnyx\Networks\NetworkListInterfacesParams\Page as Page1;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams;
use Telnyx\Networks\NetworkListParams\Filter;
use Telnyx\Networks\NetworkListParams\Page;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateParams;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworksContract;
use Telnyx\Services\Networks\DefaultGatewayService;

use const Telnyx\Core\OMIT as omit;

final class NetworksService implements NetworksContract
{
    /**
     * @@api
     */
    public DefaultGatewayService $defaultGateway;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->defaultGateway = new DefaultGatewayService($this->client);
    }

    /**
     * @api
     *
     * Create a new Network.
     *
     * @param string $name a user specified name for the network
     */
    public function create(
        $name,
        ?RequestOptions $requestOptions = null
    ): NetworkNewResponse {
        [$parsed, $options] = NetworkCreateParams::parseRequest(
            ['name' => $name],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'networks',
            body: (object) $parsed,
            options: $options,
            convert: NetworkNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Network.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['networks/%1$s', $id],
            options: $requestOptions,
            convert: NetworkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Network.
     *
     * @param string $name a user specified name for the network
     */
    public function update(
        string $id,
        $name,
        ?RequestOptions $requestOptions = null
    ): NetworkUpdateResponse {
        [$parsed, $options] = NetworkUpdateParams::parseRequest(
            ['name' => $name],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['networks/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: NetworkUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Networks.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NetworkListResponse {
        [$parsed, $options] = NetworkListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'networks',
            query: $parsed,
            options: $options,
            convert: NetworkListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Network.
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NetworkDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['networks/%1$s', $id],
            options: $requestOptions,
            convert: NetworkDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Interfaces for a Network.
     *
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status]
     * @param Page1 $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function listInterfaces(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): NetworkListInterfacesResponse {
        [$parsed, $options] = NetworkListInterfacesParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['networks/%1$s/network_interfaces', $id],
            query: $parsed,
            options: $options,
            convert: NetworkListInterfacesResponse::class,
        );
    }
}
