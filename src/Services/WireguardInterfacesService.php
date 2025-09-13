<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardInterfacesContract;
use Telnyx\WireguardInterfaces\WireguardInterfaceCreateParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Filter;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Page;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

use const Telnyx\Core\OMIT as omit;

final class WireguardInterfacesService implements WireguardInterfacesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new WireGuard Interface. Current limitation of 10 interfaces per user can be created.
     *
     * @param string $networkID the id of the network associated with the interface
     * @param string $regionCode the region the interface should be deployed to
     * @param bool $enableSipTrunking enable SIP traffic forwarding over VPN interface
     * @param string $name a user specified name for the interface
     *
     * @return WireguardInterfaceNewResponse<HasRawResponse>
     */
    public function create(
        $networkID,
        $regionCode,
        $enableSipTrunking = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceNewResponse {
        [$parsed, $options] = WireguardInterfaceCreateParams::parseRequest(
            [
                'networkID' => $networkID,
                'regionCode' => $regionCode,
                'enableSipTrunking' => $enableSipTrunking,
                'name' => $name,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'wireguard_interfaces',
            body: (object) $parsed,
            options: $options,
            convert: WireguardInterfaceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a WireGuard Interfaces.
     *
     * @return WireguardInterfaceGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['wireguard_interfaces/%1$s', $id],
            options: $requestOptions,
            convert: WireguardInterfaceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all WireGuard Interfaces.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return WireguardInterfaceListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceListResponse {
        [$parsed, $options] = WireguardInterfaceListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireguard_interfaces',
            query: $parsed,
            options: $options,
            convert: WireguardInterfaceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a WireGuard Interface.
     *
     * @return WireguardInterfaceDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['wireguard_interfaces/%1$s', $id],
            options: $requestOptions,
            convert: WireguardInterfaceDeleteResponse::class,
        );
    }
}
