<?php

declare(strict_types=1);

namespace Telnyx\Services\Wireless;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        $endTime = omit,
        $startTime = omit,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportNewResponse {
        $params = ['endTime' => $endTime, 'startTime' => $startTime];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DetailRecordsReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportNewResponse {
        [$parsed, $options] = DetailRecordsReportCreateParams::parseRequest(
            $params,
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DetailRecordsReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     *
     * @throws APIException
     */
    public function list(
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportListResponse {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return DetailRecordsReportListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportListResponse {
        [$parsed, $options] = DetailRecordsReportListParams::parseRequest(
            $params,
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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DetailRecordsReportDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return DetailRecordsReportDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
