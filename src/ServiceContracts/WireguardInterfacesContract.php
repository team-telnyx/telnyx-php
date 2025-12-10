<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

interface WireguardInterfacesContract
{
    /**
     * @api
     *
     * @param string $networkID the id of the network associated with the interface
     * @param string $regionCode the region the interface should be deployed to
     * @param bool $enableSipTrunking enable SIP traffic forwarding over VPN interface
     * @param string $name a user specified name for the interface
     *
     * @throws APIException
     */
    public function create(
        string $networkID,
        string $regionCode,
        ?bool $enableSipTrunking = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceGetResponse;

    /**
     * @api
     *
     * @param array{
     *   networkID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceDeleteResponse;
}
