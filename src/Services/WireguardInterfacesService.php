<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        $networkID,
        $regionCode,
        $enableSipTrunking = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): WireguardInterfaceNewResponse {
        $params = [
            'networkID' => $networkID,
            'regionCode' => $regionCode,
            'enableSipTrunking' => $enableSipTrunking,
            'name' => $name,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WireguardInterfaceNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceNewResponse {
        [$parsed, $options] = WireguardInterfaceCreateParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return WireguardInterfaceGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return WireguardInterfaceListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceListResponse {
        [$parsed, $options] = WireguardInterfaceListParams::parseRequest(
            $params,
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): WireguardInterfaceDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return WireguardInterfaceDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
