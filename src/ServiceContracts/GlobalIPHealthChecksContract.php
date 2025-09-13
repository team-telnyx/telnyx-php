<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckDeleteResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams\Page;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface GlobalIPHealthChecksContract
{
    /**
     * @api
     *
     * @param string $globalIPID global IP ID
     * @param array<string, mixed> $healthCheckParams a Global IP health check params
     * @param string $healthCheckType the Global IP health check type
     *
     * @return GlobalIPHealthCheckNewResponse<HasRawResponse>
     */
    public function create(
        $globalIPID = omit,
        $healthCheckParams = omit,
        $healthCheckType = omit,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPHealthCheckNewResponse;

    /**
     * @api
     *
     * @return GlobalIPHealthCheckGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return GlobalIPHealthCheckListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckListResponse;

    /**
     * @api
     *
     * @return GlobalIPHealthCheckDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckDeleteResponse;
}
