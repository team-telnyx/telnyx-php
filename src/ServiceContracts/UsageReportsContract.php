<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams\Format;
use Telnyx\UsageReports\UsageReportListParams\Page;
use Telnyx\UsageReports\UsageReportListResponse;

use const Telnyx\Core\OMIT as omit;

interface UsageReportsContract
{
    /**
     * @api
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
     * @throws APIException
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
    ): UsageReportListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UsageReportListResponse;

    /**
     * @api
     *
     * @param string $product Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function getOptions(
        $product = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetOptionsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getOptionsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UsageReportGetOptionsResponse;
}
