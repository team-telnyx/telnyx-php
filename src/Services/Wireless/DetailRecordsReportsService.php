<?php

declare(strict_types=1);

namespace Telnyx\Services\Wireless;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Wireless\DetailRecordsReportsContract;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportCreateParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

final class DetailRecordsReportsService implements DetailRecordsReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Asynchronously create a report containing Wireless Detail Records (WDRs) for the SIM cards that consumed wireless data in the given time period.
     *
     * @param array{
     *   end_time?: string, start_time?: string
     * }|DetailRecordsReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|DetailRecordsReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportNewResponse {
        [$parsed, $options] = DetailRecordsReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DetailRecordsReportNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'wireless/detail_records_reports',
            body: (object) $parsed,
            options: $options,
            convert: DetailRecordsReportNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns one specific WDR report
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportGetResponse {
        /** @var BaseResponse<DetailRecordsReportGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['wireless/detail_records_reports/%1$s', $id],
            options: $requestOptions,
            convert: DetailRecordsReportGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the WDR Reports that match the given parameters.
     *
     * @param array{
     *   page_number_?: int, page_size_?: int
     * }|DetailRecordsReportListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordsReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DetailRecordsReportListResponse {
        [$parsed, $options] = DetailRecordsReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DetailRecordsReportListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'wireless/detail_records_reports',
            query: $parsed,
            options: $options,
            convert: DetailRecordsReportListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes one specific WDR report.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportDeleteResponse {
        /** @var BaseResponse<DetailRecordsReportDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['wireless/detail_records_reports/%1$s', $id],
            options: $requestOptions,
            convert: DetailRecordsReportDeleteResponse::class,
        );

        return $response->parse();
    }
}
