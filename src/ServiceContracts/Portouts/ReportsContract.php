<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters\StatusIn;
use Telnyx\Portouts\Reports\PortoutReport;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Portouts\Reports\ReportListParams\Filter\Status;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;

interface ReportsContract
{
    /**
     * @api
     *
     * @param array{
     *   filters: array{
     *     createdAtGt?: string|\DateTimeInterface,
     *     createdAtLt?: string|\DateTimeInterface,
     *     customerReferenceIn?: list<string>,
     *     endUserName?: string,
     *     phoneNumbersOverlaps?: list<string>,
     *     statusIn?: list<'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|StatusIn>,
     *   },
     * }|ExportPortoutsCsvReport $params The parameters for generating a port-outs CSV report
     * @param 'export_portouts_csv'|\Telnyx\Portouts\Reports\ReportCreateParams\ReportType $reportType Identifies the type of report
     *
     * @throws APIException
     */
    public function create(
        array|ExportPortoutsCsvReport $params,
        string|\Telnyx\Portouts\Reports\ReportCreateParams\ReportType $reportType,
        ?RequestOptions $requestOptions = null,
    ): ReportNewResponse;

    /**
     * @api
     *
     * @param string $id identifies a report
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReportGetResponse;

    /**
     * @api
     *
     * @param array{
     *   reportType?: 'export_portouts_csv'|ReportType,
     *   status?: 'pending'|'completed'|Status,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<PortoutReport>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
