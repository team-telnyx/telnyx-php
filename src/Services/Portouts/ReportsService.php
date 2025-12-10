<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport\Filters\StatusIn;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams\Filter\ReportType;
use Telnyx\Portouts\Reports\ReportListParams\Filter\Status;
use Telnyx\Portouts\Reports\ReportListResponse;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\ReportsContract;

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
     * Generate reports about port-out operations.
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReportGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the reports generated about port-out operations.
     *
     * @param array{
     *   reportType?: 'export_portouts_csv'|ReportType,
     *   status?: 'pending'|'completed'|Status,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): ReportListResponse {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
