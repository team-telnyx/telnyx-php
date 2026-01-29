<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WireguardInterfacesRawContract;
use Telnyx\WireguardInterfaces\WireguardInterfaceCreateParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceDeleteResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Filter;
use Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Page;
use Telnyx\WireguardInterfaces\WireguardInterfaceListResponse;
use Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\WireguardInterfaces\WireguardInterfaceListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WireguardInterfacesRawService implements WireguardInterfacesRawContract
{
    // @phpstan-ignore-next-line
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
     *   regionCode: string,
     *   enableSipTrunking?: bool,
     *   name?: string,
     *   networkID?: string,
     * }|WireguardInterfaceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardInterfaceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WireguardInterfaceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WireguardInterfaceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardInterfaceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|WireguardInterfaceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<WireguardInterfaceListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|WireguardInterfaceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WireguardInterfaceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WireguardInterfaceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['wireguard_interfaces/%1$s', $id],
            options: $requestOptions,
            convert: WireguardInterfaceDeleteResponse::class,
        );
    }
}
