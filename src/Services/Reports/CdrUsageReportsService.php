<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\CdrUsageReportsContract;

use const Telnyx\Core\OMIT as omit;

final class CdrUsageReportsService implements CdrUsageReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate and fetch voice usage report synchronously. This endpoint will both generate and fetch the voice report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     * @param list<float> $connections
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     *
     * @throws APIException
     */
    public function fetchSync(
        $aggregationType,
        $productBreakdown,
        $connections = omit,
        $endDate = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse {
        $params = [
            'aggregationType' => $aggregationType,
            'productBreakdown' => $productBreakdown,
            'connections' => $connections,
            'endDate' => $endDate,
            'startDate' => $startDate,
        ];

        return $this->fetchSyncRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function fetchSyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CdrUsageReportFetchSyncResponse {
        [$parsed, $options] = CdrUsageReportFetchSyncParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'reports/cdr_usage_reports/sync',
            query: $parsed,
            options: $options,
            convert: CdrUsageReportFetchSyncResponse::class,
        );
    }
}
