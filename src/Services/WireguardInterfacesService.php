<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardInterfacesContract;
use Telnyx\WireguardInterfaces\WireguardInterfaceCreateParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

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
     * @param array{
     *   region_code: string,
     *   enable_sip_trunking?: bool,
     *   name?: string,
     *   network_id?: string,
     * }|WireguardInterfaceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|WireguardInterfaceCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceNewResponse {
        [$parsed, $options] = WireguardInterfaceCreateParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @param array{
     *   filter?: array{network_id?: string}, page?: array{number?: int, size?: int}
     * }|WireguardInterfaceListParams $params
     *
     * @return DefaultPagination<WireguardInterfaceListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardInterfaceListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = WireguardInterfaceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireguard_interfaces',
            query: $parsed,
            options: $options,
            convert: WireguardInterfaceListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a WireGuard Interface.
     *
     * @throws APIException
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
