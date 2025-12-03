<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPs\GlobalIPCreateParams;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListParams;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPsContract;

final class GlobalIPsService implements GlobalIPsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Global IP.
     *
     * @param array{
     *   description?: string, name?: string, ports?: array<string,mixed>
     * }|GlobalIPCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPNewResponse {
        [$parsed, $options] = GlobalIPCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'global_ips',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a Global IP.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Global IPs.
     *
     * @param array{page?: array{number?: int, size?: int}}|GlobalIPListParams $params
     *
     * @return DefaultPagination<GlobalIPListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = GlobalIPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ips',
            query: $parsed,
            options: $options,
            convert: GlobalIPListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Global IP.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPDeleteResponse::class,
        );
    }
}
