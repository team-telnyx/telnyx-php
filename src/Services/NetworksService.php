<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
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

        /** @var BaseResponse<NetworkNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'networks',
            body: (object) $parsed,
            options: $options,
            convert: NetworkNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<NetworkGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['networks/%1$s', $id],
            options: $requestOptions,
            convert: NetworkGetResponse::class,
        );

        return $response->parse();
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
        string $id,
        array|NetworkUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkUpdateResponse {
        [$parsed, $options] = NetworkUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NetworkUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['networks/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: NetworkUpdateResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function list(
        array|NetworkListParams $params,
        ?RequestOptions $requestOptions = null
    ): NetworkListResponse {
        [$parsed, $options] = NetworkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NetworkListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'networks',
            query: $parsed,
            options: $options,
            convert: NetworkListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<NetworkDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['networks/%1$s', $id],
            options: $requestOptions,
            convert: NetworkDeleteResponse::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        array|NetworkListInterfacesParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkListInterfacesResponse {
        [$parsed, $options] = NetworkListInterfacesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NetworkListInterfacesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['networks/%1$s/network_interfaces', $id],
            query: $parsed,
            options: $options,
            convert: NetworkListInterfacesResponse::class,
        );

        return $response->parse();
    }
}
