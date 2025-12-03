<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'global_ip_health_checks',
            body: (object) $parsed,
            options: $options,
            convert: GlobalIPHealthCheckNewResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['global_ip_health_checks/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPHealthCheckGetResponse::class,
        );
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
     * @return DefaultPagination<GlobalIPHealthCheckListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPHealthCheckListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = GlobalIPHealthCheckListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_health_checks',
            query: $parsed,
            options: $options,
            convert: GlobalIPHealthCheckListResponse::class,
            page: DefaultPagination::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['global_ip_health_checks/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPHealthCheckDeleteResponse::class,
        );
    }
}
