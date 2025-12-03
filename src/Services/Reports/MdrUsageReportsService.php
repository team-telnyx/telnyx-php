<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\MdrUsageReportsContract;

final class MdrUsageReportsService implements MdrUsageReportsContract
{
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
     *   aggregation_type: 'NO_AGGREGATION'|'PROFILE'|'TAGS',
     *   end_date: string|\DateTimeInterface,
     *   start_date: string|\DateTimeInterface,
     *   profiles?: string,
     * }|MdrUsageReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MdrUsageReportCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse {
        [$parsed, $options] = MdrUsageReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse {
        // @phpstan-ignore-next-line;
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
     *   page_number_?: int, page_size_?: int
     * }|MdrUsageReportListParams $params
     *
     * @return DefaultFlatPagination<MdrUsageReport>
     *
     * @throws APIException
     */
    public function list(
        array|MdrUsageReportListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        [$parsed, $options] = MdrUsageReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'reports/mdr_usage_reports',
            query: $parsed,
            options: $options,
            convert: MdrUsageReport::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete messaging usage report by id
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse {
        // @phpstan-ignore-next-line;
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
     *   aggregation_type: 'NO_AGGREGATION'|'PROFILE'|'TAGS',
     *   end_date?: string|\DateTimeInterface,
     *   profiles?: list<string>,
     *   start_date?: string|\DateTimeInterface,
     * }|MdrUsageReportFetchSyncParams $params
     *
     * @throws APIException
     */
    public function fetchSync(
        array|MdrUsageReportFetchSyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse {
        [$parsed, $options] = MdrUsageReportFetchSyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'reports/mdr_usage_reports/sync',
            query: $parsed,
            options: $options,
            convert: MdrUsageReportFetchSyncResponse::class,
        );
    }
}
