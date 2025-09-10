<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams\Filter;
use Telnyx\Porting\Reports\ReportListParams\Page;
use Telnyx\Porting\Reports\ReportListResponse;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ReportsContract
{
    /**
     * @api
     *
     * @param ExportPortingOrdersCsvReport $params the parameters for generating a porting orders CSV report
     * @param ReportType|value-of<ReportType> $reportType Identifies the type of report
     */
    public function create(
        $params,
        $reportType,
        ?RequestOptions $requestOptions = null
    ): ReportNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReportGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ReportListResponse;
}
