<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\PortingReport;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams\Filter;
use Telnyx\Porting\Reports\ReportListParams\Page;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ExportPortingOrdersCsvReportShape from \Telnyx\Porting\Reports\ExportPortingOrdersCsvReport
 * @phpstan-import-type FilterShape from \Telnyx\Porting\Reports\ReportListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Porting\Reports\ReportListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReportsContract
{
    /**
     * @api
     *
     * @param ExportPortingOrdersCsvReport|ExportPortingOrdersCsvReportShape $params the parameters for generating a porting orders CSV report
     * @param ReportType|value-of<ReportType> $reportType Identifies the type of report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ExportPortingOrdersCsvReport|array $params,
        ReportType|string $reportType,
        RequestOptions|array|null $requestOptions = null,
    ): ReportNewResponse;

    /**
     * @api
     *
     * @param string $id identifies a report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ReportGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingReport>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
