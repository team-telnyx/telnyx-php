<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\ReportCreateParams\ReportType;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams\Filter;
use Telnyx\Portouts\Reports\ReportListParams\Page;
use Telnyx\Portouts\Reports\ReportListResponse;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ReportsContract
{
    /**
     * @api
     *
     * @param ExportPortoutsCsvReport $params the parameters for generating a port-outs CSV report
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ReportListResponse;
}
