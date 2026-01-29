<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckDeleteResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams\Page;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPHealthChecksContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPHealthChecksService implements GlobalIPHealthChecksContract
{
    /**
     * @api
     */
    public GlobalIPHealthChecksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPHealthChecksRawService($client);
    }

    /**
     * @api
     *
     * Create a Global IP health check.
     *
     * @param string $globalIPID global IP ID
     * @param array<string,mixed> $healthCheckParams a Global IP health check params
     * @param string $healthCheckType the Global IP health check type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $globalIPID = null,
        ?array $healthCheckParams = null,
        ?string $healthCheckType = null,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPHealthCheckNewResponse {
        $params = Util::removeNulls(
            [
                'globalIPID' => $globalIPID,
                'healthCheckParams' => $healthCheckParams,
                'healthCheckType' => $healthCheckType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Global IP health check.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPHealthCheckGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Global IP health checks.
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<GlobalIPHealthCheckListResponse>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Global IP health check.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPHealthCheckDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
