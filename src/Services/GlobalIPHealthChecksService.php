<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckCreateParams;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckDeleteResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPHealthChecksContract;

final class GlobalIPHealthChecksService implements GlobalIPHealthChecksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Global IP health check.
     *
     * @param array{
     *   global_ip_id?: string,
     *   health_check_params?: array<string,mixed>,
     *   health_check_type?: string,
     * }|GlobalIPHealthCheckCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPHealthCheckCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPHealthCheckNewResponse {
        [$parsed, $options] = GlobalIPHealthCheckCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPHealthCheckNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'global_ip_health_checks',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPHealthCheckNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Global IP health check.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckGetResponse {
        /** @var BaseResponse<GlobalIPHealthCheckGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['global_ip_health_checks/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPHealthCheckGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IP health checks.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|GlobalIPHealthCheckListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPHealthCheckListParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPHealthCheckListResponse {
        [$parsed, $options] = GlobalIPHealthCheckListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPHealthCheckListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'global_ip_health_checks',
            query: $parsed,
            options: $options,
            convert: GlobalIPHealthCheckListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Global IP health check.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckDeleteResponse {
        /** @var BaseResponse<GlobalIPHealthCheckDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['global_ip_health_checks/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPHealthCheckDeleteResponse::class,
        );

        return $response->parse();
    }
}
