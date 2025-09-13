<?php

declare(strict_types=1);

namespace Telnyx\Services\Wireless;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Wireless\DetailRecordsReportsContract;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportCreateParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $endTime ISO 8601 formatted date-time indicating the end time
     * @param string $startTime ISO 8601 formatted date-time indicating the start time
     *
     * @return DetailRecordsReportNewResponse<HasRawResponse>
     */
    public function create(
        $endTime = omit,
        $startTime = omit,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportNewResponse {
        [$parsed, $options] = DetailRecordsReportCreateParams::parseRequest(
            ['endTime' => $endTime, 'startTime' => $startTime],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'wireless/detail_records_reports',
            body: (object) $parsed,
            options: $options,
            convert: DetailRecordsReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns one specific WDR report
     *
     * @return DetailRecordsReportGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['wireless/detail_records_reports/%1$s', $id],
            options: $requestOptions,
            convert: DetailRecordsReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the WDR Reports that match the given parameters.
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return DetailRecordsReportListResponse<HasRawResponse>
     */
    public function list(
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportListResponse {
        [$parsed, $options] = DetailRecordsReportListParams::parseRequest(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'wireless/detail_records_reports',
            query: $parsed,
            options: $options,
            convert: DetailRecordsReportListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes one specific WDR report.
     *
     * @return DetailRecordsReportDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['wireless/detail_records_reports/%1$s', $id],
            options: $requestOptions,
            convert: DetailRecordsReportDeleteResponse::class,
        );
    }
}
