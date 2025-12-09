<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
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
     *   aggregationType: 'NO_AGGREGATION'|'CONNECTION'|'TAG'|'BILLING_GROUP'|AggregationType,
     *   productBreakdown: 'NO_BREAKDOWN'|'DID_VS_TOLL_FREE'|'COUNTRY'|'DID_VS_TOLL_FREE_PER_COUNTRY'|ProductBreakdown,
     *   connections?: list<float>,
     *   endDate?: string|\DateTimeInterface,
     *   startDate?: string|\DateTimeInterface,
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

        /** @var BaseResponse<CdrUsageReportFetchSyncResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'reports/cdr_usage_reports/sync',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'aggregationType' => 'aggregation_type',
                    'productBreakdown' => 'product_breakdown',
                    'endDate' => 'end_date',
                    'startDate' => 'start_date',
                ],
            ),
            options: $options,
            convert: CdrUsageReportFetchSyncResponse::class,
        );

        return $response->parse();
    }
}
