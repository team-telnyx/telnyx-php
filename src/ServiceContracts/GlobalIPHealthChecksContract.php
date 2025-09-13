<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return GlobalIPHealthCheckNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckNewResponse;

    /**
     * @api
     *
     * @return GlobalIPHealthCheckGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckGetResponse;

    /**
     * @api
     *
     * @return GlobalIPHealthCheckGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return GlobalIPHealthCheckListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return GlobalIPHealthCheckListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckListResponse;

    /**
     * @api
     *
     * @return GlobalIPHealthCheckDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckDeleteResponse;

    /**
     * @api
     *
     * @return GlobalIPHealthCheckDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckDeleteResponse;
}
