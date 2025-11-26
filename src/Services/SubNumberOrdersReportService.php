<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersReportContract;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

final class SubNumberOrdersReportService implements SubNumberOrdersReportContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a CSV report for sub number orders. The report will be generated asynchronously and can be downloaded once complete.
     *
     * @param array{
     *   country_code?: string,
     *   created_at_gt?: string|\DateTimeInterface,
     *   created_at_lt?: string|\DateTimeInterface,
     *   customer_reference?: string,
     *   order_request_id?: string,
     *   status?: 'pending'|'success'|'failure',
     * }|SubNumberOrdersReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SubNumberOrdersReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SubNumberOrdersReportNewResponse {
        [$parsed, $options] = SubNumberOrdersReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'sub_number_orders_report',
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrdersReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the status and details of a sub number orders report.
     *
     * @throws APIException
     */
    public function retrieve(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): SubNumberOrdersReportGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sub_number_orders_report/%1$s', $reportID],
            options: $requestOptions,
            convert: SubNumberOrdersReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Download the CSV file for a completed sub number orders report. The report status must be 'success' before the file can be downloaded.
     *
     * @throws APIException
     */
    public function download(
        string $reportID,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['sub_number_orders_report/%1$s/download', $reportID],
            headers: ['Accept' => 'text/csv'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
