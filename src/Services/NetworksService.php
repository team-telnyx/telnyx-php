<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\Networks\NetworkCreateParams;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesParams;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateParams;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworksContract;
use Telnyx\Services\Networks\DefaultGatewayService;

final class NetworksService implements NetworksContract
{
    /**
     * @api
     */
    public DefaultGatewayService $defaultGateway;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->defaultGateway = new DefaultGatewayService($client);
    }

    /**
     * @api
     *
     * Create a new Network.
     *
     * @param array{name: string}|NetworkCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NetworkCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): NetworkNewResponse {
        [$parsed, $options] = NetworkCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     *
     * @throws APIException
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
     * @param array{name: string}|NetworkUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $networkID,
        array|NetworkUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkUpdateResponse {
        [$parsed, $options] = NetworkUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['networks/%1$s', $networkID],
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
     * @param array{
     *   filter?: array{name?: string}, page?: array{number?: int, size?: int}
     * }|NetworkListParams $params
     *
     * @return DefaultPagination<NetworkListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = NetworkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'networks',
            query: $parsed,
            options: $options,
            convert: NetworkListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Network.
     *
     * @throws APIException
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
     * @param array{
     *   filter?: array{
     *     name?: string,
     *     status?: 'created'|'provisioning'|'provisioned'|'deleting'|InterfaceStatus,
     *     type?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NetworkListInterfacesParams $params
     *
     * @return DefaultPagination<NetworkListInterfacesResponse>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        array|NetworkListInterfacesParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = NetworkListInterfacesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['networks/%1$s/network_interfaces', $id],
            query: $parsed,
            options: $options,
            convert: NetworkListInterfacesResponse::class,
            page: DefaultPagination::class,
        );
    }
}
