<?php

declare(strict_types=1);

namespace Telnyx\Services\Compute;

use Telnyx\Client;
use Telnyx\Compute\Funcs\FuncGetLogsResponse;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse;
use Telnyx\Compute\Funcs\FuncGetMetricAggregatesResponse;
use Telnyx\Compute\Funcs\FuncGetRevisionsResponse;
use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse;
use Telnyx\Compute\Funcs\FuncRetrieveLogsParams;
use Telnyx\Compute\Funcs\FuncRetrieveLogsParams\Type;
use Telnyx\Compute\Funcs\FuncRetrieveMetricAggregatesParams;
use Telnyx\Compute\Funcs\FuncRetrieveRevisionsParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Compute\FuncsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FuncsRawService implements FuncsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns logs oldest first. `type=runtime` (default) returns function stdout/stderr. `type=invocations` returns one platform-generated record per HTTP request served.
     *
     * @param string $id Function ID
     * @param array{
     *   endTime?: \DateTimeInterface,
     *   limit?: int,
     *   startTime?: \DateTimeInterface,
     *   type?: Type|value-of<Type>,
     * }|FuncRetrieveLogsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncRuntimeLogsResponse|FuncInvocationLogsResponse>
     *
     * @throws APIException
     */
    public function retrieveLogs(
        string $id,
        array|FuncRetrieveLogsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FuncRetrieveLogsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['compute/funcs/%1$s/logs', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['endTime' => 'end_time', 'startTime' => 'start_time']
            ),
            options: $options,
            convert: FuncGetLogsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns aggregate request, latency, CPU, memory, and resource-limit metrics for a function over the requested window.
     *
     * @param string $id Function ID
     * @param array{
     *   endTime: \DateTimeInterface,
     *   startTime: \DateTimeInterface,
     *   filterEdgeSite?: string,
     *   filterNamespace?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|FuncRetrieveMetricAggregatesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncGetMetricAggregatesResponse>
     *
     * @throws APIException
     */
    public function retrieveMetricAggregates(
        string $id,
        array|FuncRetrieveMetricAggregatesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FuncRetrieveMetricAggregatesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['compute/funcs/%1$s/metric_aggregates', $id],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endTime' => 'end_time',
                    'startTime' => 'start_time',
                    'filterEdgeSite' => 'filter[edge_site]',
                    'filterNamespace' => 'filter[namespace]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: FuncGetMetricAggregatesResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists a function's ship history newest first, including per-ship failure stage and reason when recorded.
     *
     * @param string $id Function ID
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|FuncRetrieveRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncGetRevisionsResponse>
     *
     * @throws APIException
     */
    public function retrieveRevisions(
        string $id,
        array|FuncRetrieveRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FuncRetrieveRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['compute/funcs/%1$s/revisions', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: FuncGetRevisionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the latest ship outcome. The stage is `none` on success, `pending` while building, or a failure stage such as `build`, `platform`, `pre_build`, `deploy`, or `security_review`. This stage-neutral customer-facing path is an alias over the same inspection resource as `build_log_inspection`.
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncGetShipInspectionResponse>
     *
     * @throws APIException
     */
    public function retrieveShipInspection(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['compute/funcs/%1$s/ship_inspection', $id],
            options: $requestOptions,
            convert: FuncGetShipInspectionResponse::class,
        );
    }
}
