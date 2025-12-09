<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\MdrUsageReportsRawContract;

final class MdrUsageReportsRawService implements MdrUsageReportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit request for new new messaging usage report. This endpoint will pull and aggregate messaging data in specified time period.
     *
     * @param array{
     *   aggregationType: 'NO_AGGREGATION'|'PROFILE'|'TAGS'|AggregationType,
     *   endDate: string|\DateTimeInterface,
     *   startDate: string|\DateTimeInterface,
     *   profiles?: string,
     * }|MdrUsageReportCreateParams $params
     *
     * @return BaseResponse<MdrUsageReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MdrUsageReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MdrUsageReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'reports/mdr_usage_reports',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: MdrUsageReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch a single messaging usage report by id
     *
     * @return BaseResponse<MdrUsageReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['reports/mdr_usage_reports/%1$s', $id],
            options: $requestOptions,
            convert: MdrUsageReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch all messaging usage reports. Usage reports are aggregated messaging data for specified time period and breakdown
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MdrUsageReportListParams $params
     *
     * @return BaseResponse<MdrUsageReportListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MdrUsageReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MdrUsageReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'reports/mdr_usage_reports',
            query: $parsed,
            options: $options,
            convert: MdrUsageReportListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete messaging usage report by id
     *
     * @return BaseResponse<MdrUsageReportDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['reports/mdr_usage_reports/%1$s', $id],
            options: $requestOptions,
            convert: MdrUsageReportDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Generate and fetch messaging usage report synchronously. This endpoint will both generate and fetch the messaging report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
     *
     * @param array{
     *   aggregationType: 'NO_AGGREGATION'|'PROFILE'|'TAGS'|MdrUsageReportFetchSyncParams\AggregationType,
     *   endDate?: string|\DateTimeInterface,
     *   profiles?: list<string>,
     *   startDate?: string|\DateTimeInterface,
     * }|MdrUsageReportFetchSyncParams $params
     *
     * @return BaseResponse<MdrUsageReportFetchSyncResponse>
     *
     * @throws APIException
     */
    public function fetchSync(
        array|MdrUsageReportFetchSyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MdrUsageReportFetchSyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'reports/mdr_usage_reports/sync',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'aggregationType' => 'aggregation_type',
                    'endDate' => 'end_date',
                    'startDate' => 'start_date',
                ],
            ),
            options: $options,
            convert: MdrUsageReportFetchSyncResponse::class,
        );
    }
}
