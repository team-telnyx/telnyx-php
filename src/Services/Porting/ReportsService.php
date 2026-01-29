<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\PortingReport;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams\Filter;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\ReportsContract;

/**
 * @phpstan-import-type ExportPortingOrdersCsvReportShape from \Telnyx\Porting\Reports\ExportPortingOrdersCsvReport
 * @phpstan-import-type FilterShape from \Telnyx\Porting\Reports\ReportListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReportsService implements ReportsContract
{
    /**
     * @api
     */
    public ReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReportsRawService($client);
    }

    /**
     * @api
     *
     * Generate reports about porting operations.
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
    ): ReportNewResponse {
        $params1 = Util::removeNulls(
            ['params' => $params, 'reportType' => $reportType]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params1, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific report generated.
     *
     * @param string $id identifies a report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ReportGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the reports generated about porting operations.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PortingReport>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
