<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Compute;

use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse;
use Telnyx\Compute\Funcs\FuncGetMetricAggregatesResponse;
use Telnyx\Compute\Funcs\FuncGetRevisionsResponse;
use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse;
use Telnyx\Compute\Funcs\FuncRetrieveLogsParams;
use Telnyx\Compute\Funcs\FuncRetrieveMetricAggregatesParams;
use Telnyx\Compute\Funcs\FuncRetrieveRevisionsParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FuncsRawContract
{
    /**
     * @api
     *
     * @param string $id Function ID
     * @param array<string,mixed>|FuncRetrieveLogsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param array<string,mixed>|FuncRetrieveMetricAggregatesParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param array<string,mixed>|FuncRetrieveRevisionsParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
