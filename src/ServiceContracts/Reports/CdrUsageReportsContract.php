<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;

interface CdrUsageReportsContract
{
    /**
     * @api
     *
     * @param 'NO_AGGREGATION'|'CONNECTION'|'TAG'|'BILLING_GROUP'|AggregationType $aggregationType
     * @param 'NO_BREAKDOWN'|'DID_VS_TOLL_FREE'|'COUNTRY'|'DID_VS_TOLL_FREE_PER_COUNTRY'|ProductBreakdown $productBreakdown
     * @param list<float> $connections
     *
     * @throws APIException
     */
    public function fetchSync(
        string|AggregationType $aggregationType,
        string|ProductBreakdown $productBreakdown,
        ?array $connections = null,
        string|\DateTimeInterface|null $endDate = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse;
}
