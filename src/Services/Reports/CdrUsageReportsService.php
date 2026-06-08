<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\CdrUsageReportsContract;

/**
 * Voice usage reports.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CdrUsageReportsService implements CdrUsageReportsContract
{
    /**
     * @api
     */
    public CdrUsageReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CdrUsageReportsRawService($client);
    }

    /**
     * @api
     *
     * Generate and fetch voice usage report synchronously. This endpoint will both generate and fetch the voice report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType type of aggregation to apply to the results
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown filter results by product breakdown
     * @param list<float> $connections filter results by connection
     * @param \DateTimeInterface $endDate end of the date range filter (inclusive, ISO 8601)
     * @param \DateTimeInterface $startDate start of the date range filter (inclusive, ISO 8601)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fetchSync(
        AggregationType|string $aggregationType,
        ProductBreakdown|string $productBreakdown,
        ?array $connections = null,
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse {
        $params = Util::removeNulls(
            [
                'aggregationType' => $aggregationType,
                'productBreakdown' => $productBreakdown,
                'connections' => $connections,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->fetchSync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
