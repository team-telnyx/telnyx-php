<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CdrUsageReportsContract
{
    /**
     * @api
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     * @param list<float> $connections
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     */
    public function fetchSync(
        $aggregationType,
        $productBreakdown,
        $connections = omit,
        $endDate = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse;
}
