<?php

declare(strict_types=1);

namespace Telnyx\Services\Wireless;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Wireless\DetailRecordsReportsRawContract;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportCreateParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportDeleteResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportGetResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListParams;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportListResponse;
use Telnyx\Wireless\DetailRecordsReports\DetailRecordsReportNewResponse;

/**
 * Wireless reporting operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DetailRecordsReportsRawService implements DetailRecordsReportsRawContract
{
    // @phpstan-ignore-next-line
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
     *   endTime?: string, startTime?: string
     * }|DetailRecordsReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailRecordsReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DetailRecordsReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DetailRecordsReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailRecordsReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|DetailRecordsReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailRecordsReportListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DetailRecordsReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DetailRecordsReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'wireless/detail_records_reports',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DetailRecordsReportListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes one specific WDR report.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DetailRecordsReportDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['wireless/detail_records_reports/%1$s', $id],
            options: $requestOptions,
            convert: DetailRecordsReportDeleteResponse::class,
        );
    }
}
