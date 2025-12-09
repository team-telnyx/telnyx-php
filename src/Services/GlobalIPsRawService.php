<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPs\GlobalIPCreateParams;
use Telnyx\GlobalIPs\GlobalIPDeleteResponse;
use Telnyx\GlobalIPs\GlobalIPGetResponse;
use Telnyx\GlobalIPs\GlobalIPListParams;
use Telnyx\GlobalIPs\GlobalIPListResponse;
use Telnyx\GlobalIPs\GlobalIPNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPsRawContract;

final class GlobalIPsRawService implements GlobalIPsRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<GlobalIPNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = GlobalIPCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     *
     * @return BaseResponse<GlobalIPGetResponse>
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
     * @return BaseResponse<GlobalIPListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = GlobalIPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ips',
            query: $parsed,
            options: $options,
            convert: GlobalIPListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Global IP.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<GlobalIPDeleteResponse>
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
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPDeleteResponse::class,
        );
    }
}
