<?php

declare(strict_types=1);

namespace Telnyx\Services\Reports;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\AggregationType;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncParams\ProductBreakdown;
use Telnyx\Reports\CdrUsageReports\CdrUsageReportFetchSyncResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reports\CdrUsageReportsContract;

final class CdrUsageReportsService implements CdrUsageReportsContract
{
    /**
     * @api
     */
    public CdrUsageReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CdrUsageReportsRawService($client);
    }

    /**
     * @api
     *
     * Generate and fetch voice usage report synchronously. This endpoint will both generate and fetch the voice report over a specified time period. No polling is necessary but the response may take up to a couple of minutes.
     *
     * @param 'NO_AGGREGATION'|'CONNECTION'|'TAG'|'BILLING_GROUP'|AggregationType $aggregationType
     * @param 'NO_BREAKDOWN'|'DID_VS_TOLL_FREE'|'COUNTRY'|'DID_VS_TOLL_FREE_PER_COUNTRY'|ProductBreakdown $productBreakdown
     * @param list<float> $connections
     *
     * @throws APIException
     */
    public function fetchSync(
        string|AggregationType $aggregationType,
        string|ProductBreakdown $productBreakdown,
        ?array $connections = null,
        string|\DateTimeInterface|null $endDate = null,
        string|\DateTimeInterface|null $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): CdrUsageReportFetchSyncResponse {
        $params = [
            'aggregationType' => $aggregationType,
            'productBreakdown' => $productBreakdown,
            'connections' => $connections,
            'endDate' => $endDate,
            'startDate' => $startDate,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->fetchSync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
