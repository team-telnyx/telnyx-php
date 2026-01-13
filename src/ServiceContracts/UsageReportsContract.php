<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams\Format;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsageReportsContract
{
    /**
     * @api
     *
     * @param list<string> $dimensions Query param: Breakout by specified product dimensions
     * @param list<string> $metrics Query param: Specified product usage values
     * @param string $product Query param: Telnyx product
     * @param string $dateRange Query param: A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     * @param string $endDate Query param: The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ
     * @param string $filter Query param: Filter records on dimensions
     * @param Format|value-of<Format> $format Query param: Specify the response format (csv or json). JSON is returned by default, even if not specified.
     * @param bool $managedAccounts query param: Return the aggregations for all Managed Accounts under the user making the request
     * @param int $pageNumber Query param
     * @param int $pageSize Query param
     * @param list<string> $sort Query param: Specifies the sort order for results
     * @param string $startDate Query param: The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<array<string,mixed>>
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
        Format|string|null $format = null,
        ?bool $managedAccounts = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
        ?string $startDate = null,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $product Query param: Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getOptions(
        ?string $product = null,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): UsageReportGetOptionsResponse;
}
