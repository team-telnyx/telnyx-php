<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
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
interface WireguardInterfacesContract
{
    /**
     * @api
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
    ): WireguardInterfaceNewResponse;

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
    ): WireguardInterfaceGetResponse;

    /**
     * @api
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
    ): DefaultPagination;

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
    ): WireguardInterfaceDeleteResponse;
}
