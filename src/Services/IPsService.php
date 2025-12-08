<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\IPs\IPCreateParams;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPListParams;
use Telnyx\IPs\IPListResponse;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateParams;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPsContract;

final class IPsService implements IPsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new IP object.
     *
     * @param array{
     *   ip_address: string, connection_id?: string, port?: int
     * }|IPCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): IPNewResponse {
        [$parsed, $options] = IPCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<IPNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'ips',
            body: (object) $parsed,
            options: $options,
            convert: IPNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details regarding a specific IP.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse {
        /** @var BaseResponse<IPGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the details of a specific IP.
     *
     * @param array{
     *   ip_address: string, connection_id?: string, port?: int
     * }|IPUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IPUpdateResponse {
        [$parsed, $options] = IPUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<IPUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['ips/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all IPs belonging to the user that match the given filters.
     *
     * @param array{
     *   filter?: array{connection_id?: string, ip_address?: string, port?: int},
     *   page?: array{number?: int, size?: int},
     * }|IPListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|IPListParams $params,
        ?RequestOptions $requestOptions = null
    ): IPListResponse {
        [$parsed, $options] = IPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<IPListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ips',
            query: $parsed,
            options: $options,
            convert: IPListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an IP.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPDeleteResponse {
        /** @var BaseResponse<IPDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPDeleteResponse::class,
        );

        return $response->parse();
    }
}
