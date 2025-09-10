<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\ReportCreateParams;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams;
use Telnyx\Porting\Reports\ReportListParams\Filter;
use Telnyx\Porting\Reports\ReportListParams\Page;
use Telnyx\Porting\Reports\ReportListResponse;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\ReportsContract;

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
     * Generate reports about porting operations.
     *
     * @param ExportPortingOrdersCsvReport $params the parameters for generating a porting orders CSV report
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
            path: 'porting/reports',
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
            path: ['porting/reports/%1$s', $id],
            options: $requestOptions,
            convert: ReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List the reports generated about porting operations.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[report_type], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
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
            path: 'porting/reports',
            query: $parsed,
            options: $options,
            convert: ReportListResponse::class,
        );
    }
}
