<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return CdrUsageReportFetchSyncResponse<HasRawResponse>
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
    ): CdrUsageReportFetchSyncResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CdrUsageReportFetchSyncResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function fetchSyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CdrUsageReportFetchSyncResponse;
}
