<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport\Filters\StatusIn;
use Telnyx\Porting\Reports\PortingReport;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Porting\Reports\ReportListParams\Filter\Status;
use Telnyx\Porting\Reports\ReportNewResponse;
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
     *     statusIn?: list<'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|StatusIn>,
     *   },
     * }|ExportPortingOrdersCsvReport $params The parameters for generating a porting orders CSV report
     * @param 'export_porting_orders_csv'|\Telnyx\Porting\Reports\ReportCreateParams\ReportType $reportType Identifies the type of report
     *
     * @throws APIException
     */
    public function create(
        array|ExportPortingOrdersCsvReport $params,
        string|\Telnyx\Porting\Reports\ReportCreateParams\ReportType $reportType,
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
     *   reportType?: 'export_porting_orders_csv'|ReportType,
     *   status?: 'pending'|'completed'|Status,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<PortingReport>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
