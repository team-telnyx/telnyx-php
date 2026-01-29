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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param ProductBreakdown|value-of<ProductBreakdown> $productBreakdown
     * @param list<float> $connections
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
