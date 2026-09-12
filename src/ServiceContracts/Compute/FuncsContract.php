<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Compute;

use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse;
use Telnyx\Compute\Funcs\FuncGetMetricAggregatesResponse;
use Telnyx\Compute\Funcs\FuncGetRevisionsResponse;
use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse;
use Telnyx\Compute\Funcs\FuncRetrieveLogsParams\Type;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FuncsContract
{
    /**
     * @api
     *
     * @param string $id Function ID
     * @param \DateTimeInterface $endTime return records at or before this RFC 3339 timestamp
     * @param int $limit maximum records to return
     * @param \DateTimeInterface $startTime return records at or after this RFC 3339 timestamp
     * @param Type|value-of<Type> $type log stream to return
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveLogs(
        string $id,
        ?\DateTimeInterface $endTime = null,
        ?int $limit = null,
        ?\DateTimeInterface $startTime = null,
        Type|string $type = 'runtime',
        RequestOptions|array|null $requestOptions = null,
    ): FuncRuntimeLogsResponse|FuncInvocationLogsResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param \DateTimeInterface $endTime Exclusive window end, UTC ISO 8601 with milliseconds
     * @param \DateTimeInterface $startTime Inclusive window start, UTC ISO 8601 with milliseconds
     * @param string $filterEdgeSite Edge site filter
     * @param string $filterNamespace Kubernetes namespace filter
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveMetricAggregates(
        string $id,
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime,
        ?string $filterEdgeSite = null,
        ?string $filterNamespace = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): FuncGetMetricAggregatesResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRevisions(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 10,
        RequestOptions|array|null $requestOptions = null,
    ): FuncGetRevisionsResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveShipInspection(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FuncGetShipInspectionResponse;
}
