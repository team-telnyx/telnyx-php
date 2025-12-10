<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;

interface MdrUsageReportsContract
{
    /**
     * @api
     *
     * @param 'NO_AGGREGATION'|'PROFILE'|'TAGS'|AggregationType $aggregationType
     *
     * @throws APIException
     */
    public function create(
        string|AggregationType $aggregationType,
        string|\DateTimeInterface $endDate,
        string|\DateTimeInterface $startDate,
        ?string $profiles = null,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse;

    /**
     * @api
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse;

    /**
     * @api
     *
     * @param 'NO_AGGREGATION'|'PROFILE'|'TAGS'|\Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType $aggregationType
     * @param list<string> $profiles
     *
     * @throws APIException
     */
    public function fetchSync(
        string|\Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType $aggregationType,
        string|\DateTimeInterface|null $endDate = null,
        ?array $profiles = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse;
}
