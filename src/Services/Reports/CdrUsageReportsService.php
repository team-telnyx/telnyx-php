<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\CdrUsageReportsContract;

final class CdrUsageReportsService implements CdrUsageReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate and fetch voice usage report synchronously. This endpoint will both generate and fetch the voice report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
     *
     * @param array{
     *   aggregation_type: 'NO_AGGREGATION'|'CONNECTION'|'TAG'|'BILLING_GROUP',
     *   product_breakdown: 'NO_BREAKDOWN'|'DID_VS_TOLL_FREE'|'COUNTRY'|'DID_VS_TOLL_FREE_PER_COUNTRY',
     *   connections?: list<float>,
     *   end_date?: string|\DateTimeInterface,
     *   start_date?: string|\DateTimeInterface,
     * }|CdrUsageReportFetchSyncParams $params
     *
     * @throws APIException
     */
    public function fetchSync(
        array|CdrUsageReportFetchSyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse {
        [$parsed, $options] = CdrUsageReportFetchSyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'reports/cdr_usage_reports/sync',
            query: $parsed,
            options: $options,
            convert: CdrUsageReportFetchSyncResponse::class,
        );
    }
}
