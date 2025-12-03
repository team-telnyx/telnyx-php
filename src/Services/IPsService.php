<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\IPs\IP;
use Telnyx\IPs\IPCreateParams;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPListParams;
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPGetResponse {
        // @phpstan-ignore-next-line;
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

        // @phpstan-ignore-next-line;
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
     *   filter?: array{connection_id?: string, ip_address?: string, port?: int},
     *   page?: array{number?: int, size?: int},
     * }|IPListParams $params
     *
     * @return DefaultPagination<IP>
     *
     * @throws APIException
     */
    public function list(
        array|IPListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = IPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ips',
            query: $parsed,
            options: $options,
            convert: IP::class,
            page: DefaultPagination::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ips/%1$s', $id],
            options: $requestOptions,
            convert: IPDeleteResponse::class,
        );
    }
}
