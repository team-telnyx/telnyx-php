<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\MdrUsageReportsContract;

final class MdrUsageReportsService implements MdrUsageReportsContract
{
    /**
     * @api
     */
    public MdrUsageReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MdrUsageReportsRawService($client);
    }

    /**
     * @api
     *
     * Submit request for new new messaging usage report. This endpoint will pull and aggregate messaging data in specified time period.
     *
     * @param 'NO_AGGREGATION'|'PROFILE'|'TAGS'|AggregationType $aggregationType
     *
     * @throws APIException
     */
    public function create(
        string|AggregationType $aggregationType,
        string|\DateTimeInterface $endDate,
        string|\DateTimeInterface $startDate,
        ?string $profiles = null,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportNewResponse {
        $params = Util::removeNulls(
            [
                'aggregationType' => $aggregationType,
                'endDate' => $endDate,
                'startDate' => $startDate,
                'profiles' => $profiles,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch all messaging usage reports. Usage reports are aggregated messaging data for specified time period and breakdown
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): MdrUsageReportListResponse {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Generate and fetch messaging usage report synchronously. This endpoint will both generate and fetch the messaging report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
     *
     * @param 'NO_AGGREGATION'|'PROFILE'|'TAGS'|\Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType $aggregationType
     * @param list<string> $profiles
     *
     * @throws APIException
     */
    public function fetchSync(
        string|\Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType $aggregationType,
        string|\DateTimeInterface|null $endDate = null,
        ?array $profiles = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): MdrUsageReportFetchSyncResponse {
        $params = Util::removeNulls(
            [
                'aggregationType' => $aggregationType,
                'endDate' => $endDate,
                'profiles' => $profiles,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->fetchSync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
