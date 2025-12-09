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
use Telnyx\ServiceContracts\IPsRawContract;

final class IPsRawService implements IPsRawContract
{
    // @phpstan-ignore-next-line
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
     *   ipAddress: string, connectionID?: string, port?: int
     * }|IPCreateParams $params
     *
     * @return BaseResponse<IPNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = IPCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ips',
            body: (object) $parsed,
            options: $options,
            convert: IPNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the details regarding a specific IP.
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<IPGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the details of a specific IP.
     *
     * @param string $id identifies the type of resource
     * @param array{
     *   ipAddress: string, connectionID?: string, port?: int
     * }|IPUpdateParams $params
     *
     * @return BaseResponse<IPUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IPUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['ips/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all IPs belonging to the user that match the given filters.
     *
     * @param array{
     *   filter?: array{connectionID?: string, ipAddress?: string, port?: int},
     *   page?: array{number?: int, size?: int},
     * }|IPListParams $params
     *
     * @return BaseResponse<IPListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|IPListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = IPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ips',
            query: $parsed,
            options: $options,
            convert: IPListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an IP.
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<IPDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPDeleteResponse::class,
        );
    }
}
