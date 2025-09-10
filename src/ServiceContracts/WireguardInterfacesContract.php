<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Filter;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Page;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

use const Telnyx\Core\OMIT as omit;

interface WireguardInterfacesContract
{
    /**
     * @api
     *
     * @param string $networkID the id of the network associated with the interface
     * @param string $regionCode the region the interface should be deployed to
     * @param bool $enableSipTrunking enable SIP traffic forwarding over VPN interface
     * @param string $name a user specified name for the interface
     */
    public function create(
        $networkID,
        $regionCode,
        $enableSipTrunking = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceDeleteResponse;
}
