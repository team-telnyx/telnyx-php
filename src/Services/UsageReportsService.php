<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UsageReportsContract;
use Telnyx\UsageReports\UsageReportGetOptionsParams;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams;
use Telnyx\UsageReports\UsageReportListParams\Format;
use Telnyx\UsageReports\UsageReportListParams\Page;
use Telnyx\UsageReports\UsageReportListResponse;

use const Telnyx\Core\OMIT as omit;

final class UsageReportsService implements UsageReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Telnyx usage data by product, broken out by the specified dimensions
     *
     * @param list<string> $dimensions Breakout by specified product dimensions
     * @param list<string> $metrics Specified product usage values
     * @param string $product Telnyx product
     * @param string $dateRange A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     * @param string $endDate The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ
     * @param string $filter Filter records on dimensions
     * @param Format|value-of<Format> $format Specify the response format (csv or json). JSON is returned by default, even if not specified.
     * @param bool $managedAccounts return the aggregations for all Managed Accounts under the user making the request
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param list<string> $sort Specifies the sort order for results
     * @param string $startDate The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @return UsageReportListResponse<HasRawResponse>
     */
    public function list(
        $dimensions,
        $metrics,
        $product,
        $dateRange = omit,
        $endDate = omit,
        $filter = omit,
        $format = omit,
        $managedAccounts = omit,
        $page = omit,
        $sort = omit,
        $startDate = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UsageReportListResponse {
        [$parsed, $options] = UsageReportListParams::parseRequest(
            [
                'dimensions' => $dimensions,
                'metrics' => $metrics,
                'product' => $product,
                'dateRange' => $dateRange,
                'endDate' => $endDate,
                'filter' => $filter,
                'format' => $format,
                'managedAccounts' => $managedAccounts,
                'page' => $page,
                'sort' => $sort,
                'startDate' => $startDate,
                'authorizationBearer' => $authorizationBearer,
            ],
            $requestOptions,
        );
        $query_params = array_flip(
            [
                'dimensions',
                'metrics',
                'product',
                'date_range',
                'end_date',
                'filter',
                'format',
                'managed_accounts',
                'page',
                'sort',
                'start_date',
            ],
        );

        /** @var array<string, string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'usage_reports',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UsageReportListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions
     *
     * @param string $product Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @return UsageReportGetOptionsResponse<HasRawResponse>
     */
    public function getOptions(
        $product = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetOptionsResponse {
        [$parsed, $options] = UsageReportGetOptionsParams::parseRequest(
            ['product' => $product, 'authorizationBearer' => $authorizationBearer],
            $requestOptions,
        );
        $query_params = array_flip(['product']);

        /** @var array<string, string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'usage_reports/options',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UsageReportGetOptionsResponse::class,
        );
    }
}
