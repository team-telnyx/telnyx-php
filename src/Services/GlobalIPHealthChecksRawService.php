<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckCreateParams;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckDeleteResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams\Page;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPHealthChecksRawContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPHealthChecksRawService implements GlobalIPHealthChecksRawContract
{
    // @phpstan-ignore-next-line
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
     *   globalIPID?: string,
     *   healthCheckParams?: array<string,mixed>,
     *   healthCheckType?: string,
     * }|GlobalIPHealthCheckCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPHealthCheckNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPHealthCheckCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GlobalIPHealthCheckCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPHealthCheckGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{page?: Page|PageShape}|GlobalIPHealthCheckListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<GlobalIPHealthCheckListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPHealthCheckListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GlobalIPHealthCheckListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPHealthCheckDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['global_ip_health_checks/%1$s', $id],
            options: $requestOptions,
            convert: GlobalIPHealthCheckDeleteResponse::class,
        );
    }
}
