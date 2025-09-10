<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\ReportCreateParams;
use Telnyx\Portouts\Reports\ReportCreateParams\ReportType;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams;
use Telnyx\Portouts\Reports\ReportListParams\Filter;
use Telnyx\Portouts\Reports\ReportListParams\Page;
use Telnyx\Portouts\Reports\ReportListResponse;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\ReportsContract;

use const Telnyx\Core\OMIT as omit;

final class ReportsService implements ReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate reports about port-out operations.
     *
     * @param ExportPortoutsCsvReport $params the parameters for generating a port-outs CSV report
     * @param ReportType|value-of<ReportType> $reportType Identifies the type of report
     */
    public function create(
        $params,
        $reportType,
        ?RequestOptions $requestOptions = null
    ): ReportNewResponse {
        [$parsed, $options] = ReportCreateParams::parseRequest(
            ['params' => $params, 'reportType' => $reportType],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'portouts/reports',
            body: (object) $parsed,
            options: $options,
            convert: ReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific report generated.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReportGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['portouts/reports/%1$s', $id],
            options: $requestOptions,
            convert: ReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List the reports generated about port-out operations.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ReportListResponse {
        [$parsed, $options] = ReportListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'portouts/reports',
            query: $parsed,
            options: $options,
            convert: ReportListResponse::class,
        );
    }
}
