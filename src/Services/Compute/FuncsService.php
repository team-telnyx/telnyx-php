<?php

declare(strict_types=1);

namespace Telnyx\Services\Compute;

use Telnyx\Client;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse;
use Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncRuntimeLogsResponse;
use Telnyx\Compute\Funcs\FuncGetMetricAggregatesResponse;
use Telnyx\Compute\Funcs\FuncGetRevisionsResponse;
use Telnyx\Compute\Funcs\FuncGetShipInspectionResponse;
use Telnyx\Compute\Funcs\FuncRetrieveLogsParams\Type;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Compute\FuncsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FuncsService implements FuncsContract
{
    /**
     * @api
     */
    public FuncsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FuncsRawService($client);
    }

    /**
     * @api
     *
     * Returns logs oldest first. `type=runtime` (default) returns function stdout/stderr. `type=invocations` returns one platform-generated record per HTTP request served.
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
    ): FuncRuntimeLogsResponse|FuncInvocationLogsResponse {
        $params = array_filter(
            [
                'endTime' => $endTime ?? Omitted::VALUE,
                'limit' => $limit ?? Omitted::VALUE,
                'startTime' => $startTime ?? Omitted::VALUE,
                'type' => $type,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveLogs($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns aggregate request, latency, CPU, memory, and resource-limit metrics for a function over the requested window.
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
    ): FuncGetMetricAggregatesResponse {
        $params = array_filter(
            [
                'endTime' => $endTime,
                'startTime' => $startTime,
                'filterEdgeSite' => $filterEdgeSite ?? Omitted::VALUE,
                'filterNamespace' => $filterNamespace ?? Omitted::VALUE,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveMetricAggregates($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists a function's ship history newest first, including per-ship failure stage and reason when recorded.
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
    ): FuncGetRevisionsResponse {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRevisions($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the latest ship outcome. The stage is `none` on success, `pending` while building, or a failure stage such as `build`, `platform`, `pre_build`, `deploy`, or `security_review`. This stage-neutral customer-facing path is an alias over the same inspection resource as `build_log_inspection`.
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveShipInspection(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FuncGetShipInspectionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveShipInspection($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
