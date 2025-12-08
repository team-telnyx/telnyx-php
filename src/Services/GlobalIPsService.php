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

        /** @var BaseResponse<GlobalIPNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'global_ips',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<GlobalIPGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IPs.
     *
     * @param array{page?: array{number?: int, size?: int}}|GlobalIPListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPListParams $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPListResponse {
        [$parsed, $options] = GlobalIPListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'global_ips',
            query: $parsed,
            options: $options,
            convert: GlobalIPListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<GlobalIPDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['global_ips/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPDeleteResponse::class,
        );

        return $response->parse();
    }
}
