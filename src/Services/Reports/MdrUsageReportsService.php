<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\MdrUsageReports\MdrUsageReport;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportCreateParams\AggregationType;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportDeleteResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportGetResponse;
use Telnyx\Reports\MdrUsageReports\MdrUsageReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\MdrUsageReportsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        AggregationType|string $aggregationType,
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate,
        ?string $profiles = null,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MdrUsageReport>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete messaging usage report by id
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param \Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType|value-of<\Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType> $aggregationType
     * @param list<string> $profiles
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function fetchSync(
        \Telnyx\Reports\MdrUsageReports\MdrUsageReportFetchSyncParams\AggregationType|string $aggregationType,
        ?\DateTimeInterface $endDate = null,
        ?array $profiles = null,
        ?\DateTimeInterface $startDate = null,
        RequestOptions|array|null $requestOptions = null,
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
