<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType as AggregationType1;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListParams\Page;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\MdrUsageReportsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param \DateTimeInterface $endDate
     * @param \DateTimeInterface $startDate
     * @param string $profiles
     *
     * @return MdrUsageReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $aggregationType,
        $endDate,
        $startDate,
        $profiles = omit,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse {
        $params = [
            'aggregationType' => $aggregationType,
            'endDate' => $endDate,
            'startDate' => $startDate,
            'profiles' => $profiles,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MdrUsageReportNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportNewResponse {
        [$parsed, $options] = MdrUsageReportCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return MdrUsageReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MdrUsageReportGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return MdrUsageReportListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MdrUsageReportListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse {
        [$parsed, $options] = MdrUsageReportListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return MdrUsageReportDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MdrUsageReportDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
     * @param AggregationType1|value-of<AggregationType1> $aggregationType
     * @param \DateTimeInterface $endDate
     * @param list<string> $profiles
     * @param \DateTimeInterface $startDate
     *
     * @return MdrUsageReportFetchSyncResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function fetchSync(
        $aggregationType,
        $endDate = omit,
        $profiles = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse {
        $params = [
            'aggregationType' => $aggregationType,
            'endDate' => $endDate,
            'profiles' => $profiles,
            'startDate' => $startDate,
        ];

        return $this->fetchSyncRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MdrUsageReportFetchSyncResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function fetchSyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportFetchSyncResponse {
        [$parsed, $options] = MdrUsageReportFetchSyncParams::parseRequest(
            $params,
            $requestOptions
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
