<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SubNumberOrdersReportContract;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportCreateParams\Status;
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
     *   countryCode?: string,
     *   createdAtGt?: string|\DateTimeInterface,
     *   createdAtLt?: string|\DateTimeInterface,
     *   customerReference?: string,
     *   orderRequestID?: string,
     *   status?: 'pending'|'success'|'failure'|Status,
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

        /** @var BaseResponse<SubNumberOrdersReportNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'sub_number_orders_report',
            body: (object) $parsed,
            options: $options,
            convert: SubNumberOrdersReportNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<SubNumberOrdersReportGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['sub_number_orders_report/%1$s', $reportID],
            options: $requestOptions,
            convert: SubNumberOrdersReportGetResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'get',
            path: ['sub_number_orders_report/%1$s/download', $reportID],
            headers: ['Accept' => 'text/csv'],
            options: $requestOptions,
            convert: 'string',
        );

        return $response->parse();
    }
}
