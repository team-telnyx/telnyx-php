<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CdrUsageReportsContract
{
    /**
     * @api
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
    ): CdrUsageReportFetchSyncResponse;
}
