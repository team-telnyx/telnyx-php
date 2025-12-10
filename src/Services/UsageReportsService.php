<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UsageReportsContract;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams\Format;
use Telnyx\UsageReports\UsageReportListResponse;

final class UsageReportsService implements UsageReportsContract
{
    /**
     * @api
     */
    public UsageReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsageReportsRawService($client);
    }

    /**
     * @api
     *
     * Get Telnyx usage data by product, broken out by the specified dimensions
     *
     * @param list<string> $dimensions Query param: Breakout by specified product dimensions
     * @param list<string> $metrics Query param: Specified product usage values
     * @param string $product Query param: Telnyx product
     * @param string $dateRange Query param: A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     * @param string $endDate Query param: The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ
     * @param string $filter Query param: Filter records on dimensions
     * @param 'csv'|'json'|Format $format Query param: Specify the response format (csv or json). JSON is returned by default, even if not specified.
     * @param bool $managedAccounts query param: Return the aggregations for all Managed Accounts under the user making the request
     * @param array{
     *   number?: int, size?: int
     * } $page Query param: Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param list<string> $sort Query param: Specifies the sort order for results
     * @param string $startDate Query param: The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function list(
        array $dimensions,
        array $metrics,
        string $product,
        ?string $dateRange = null,
        ?string $endDate = null,
        ?string $filter = null,
        string|Format|null $format = null,
        ?bool $managedAccounts = null,
        ?array $page = null,
        ?array $sort = null,
        ?string $startDate = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UsageReportListResponse {
        $params = Util::removeNulls(
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
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions
     *
     * @param string $product Query param: Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function getOptions(
        ?string $product = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetOptionsResponse {
        $params = Util::removeNulls(
            ['product' => $product, 'authorizationBearer' => $authorizationBearer]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getOptions(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
