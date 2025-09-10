<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType as AggregationType1;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams\Page;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MdrUsageReportsContract
{
    /**
     * @api
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     * @param string $profiles
     */
    public function create(
        $aggregationType,
        $endDate,
        $startDate,
        $profiles = omit,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse;

    /**
     * @api
     *
     * @param AggregationType1|value-of<AggregationType1> $aggregationType
     * @param \DateTimeInterface $endDate
     * @param list<string> $profiles
     * @param \DateTimeInterface $startDate
     */
    public function fetchSync(
        $aggregationType,
        $endDate = omit,
        $profiles = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse;
}
