<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardInterfacesContract;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Filter;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Page;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WireguardInterfacesService implements WireguardInterfacesContract
{
    /**
     * @api
     */
    public WireguardInterfacesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WireguardInterfacesRawService($client);
    }

    /**
     * @api
     *
     * Create a new WireGuard Interface. Current limitation of 10 interfaces per user can be created.
     *
     * @param string $regionCode the region the interface should be deployed to
     * @param bool $enableSipTrunking enable SIP traffic forwarding over VPN interface
     * @param string $name a user specified name for the interface
     * @param string $networkID the id of the network associated with the interface
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $regionCode,
        ?bool $enableSipTrunking = null,
        ?string $name = null,
        ?string $networkID = null,
        RequestOptions|array|null $requestOptions = null,
    ): WireguardInterfaceNewResponse {
        $params = Util::removeNulls(
            [
                'regionCode' => $regionCode,
                'enableSipTrunking' => $enableSipTrunking,
                'name' => $name,
                'networkID' => $networkID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a WireGuard Interfaces.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WireguardInterfaceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all WireGuard Interfaces.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<WireguardInterfaceListResponse>
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
     * Delete a WireGuard Interface.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WireguardInterfaceDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
