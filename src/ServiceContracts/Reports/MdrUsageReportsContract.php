<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MdrUsageReportsContract
{
    /**
     * @api
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        AggregationType|string $aggregationType,
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate,
        ?string $profiles = null,
        RequestOptions|array|null $requestOptions = null,
    ): MdrUsageReportNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MdrUsageReportGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MdrUsageReport>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MdrUsageReportDeleteResponse;

    /**
     * @api
     *
     * @param \Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType|value-of<\Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType> $aggregationType
     * @param list<string> $profiles
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fetchSync(
        \Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType|string $aggregationType,
        ?\DateTimeInterface $endDate = null,
        ?array $profiles = null,
        ?\DateTimeInterface $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse;
}
