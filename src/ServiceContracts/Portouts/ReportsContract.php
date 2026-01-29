<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\PortoutReport;
use Telnyx\Portouts\Reports\ReportCreateParams\ReportType;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams\Filter;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ExportPortoutsCsvReportShape from \Telnyx\Portouts\Reports\ExportPortoutsCsvReport
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\Reports\ReportListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReportsContract
{
    /**
     * @api
     *
     * @param ExportPortoutsCsvReport|ExportPortoutsCsvReportShape $params the parameters for generating a port-outs CSV report
     * @param ReportType|value-of<ReportType> $reportType Identifies the type of report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ExportPortoutsCsvReport|array $params,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortoutReport>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
