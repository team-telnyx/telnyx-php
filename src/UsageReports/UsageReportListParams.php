<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UsageReports\UsageReportListParams\Format;
use Telnyx\UsageReports\UsageReportListParams\Page;

/**
 * Get Telnyx usage data by product, broken out by the specified dimensions.
 *
 * @see Telnyx\Services\UsageReportsService::list()
 *
 * @phpstan-type UsageReportListParamsShape = array{
 *   dimensions: list<string>,
 *   metrics: list<string>,
 *   product: string,
 *   date_range?: string,
 *   end_date?: string,
 *   filter?: string,
 *   format?: Format|value-of<Format>,
 *   managed_accounts?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: list<string>,
 *   start_date?: string,
 *   authorization_bearer?: string,
 * }
 */
final class UsageReportListParams implements BaseModel
{
    /** @use SdkModel<UsageReportListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Breakout by specified product dimensions.
     *
     * @var list<string> $dimensions
     */
    #[Api(list: 'string')]
    public array $dimensions;

    /**
     * Specified product usage values.
     *
     * @var list<string> $metrics
     */
    #[Api(list: 'string')]
    public array $metrics;

    /**
     * Telnyx product.
     */
    #[Api]
    public string $product;

    /**
     * A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     */
    #[Api(optional: true)]
    public ?string $date_range;

    /**
     * The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    #[Api(optional: true)]
    public ?string $end_date;

    /**
     * Filter records on dimensions.
     */
    #[Api(optional: true)]
    public ?string $filter;

    /**
     * Specify the response format (csv or json). JSON is returned by default, even if not specified.
     *
     * @var value-of<Format>|null $format
     */
    #[Api(enum: Format::class, optional: true)]
    public ?string $format;

    /**
     * Return the aggregations for all Managed Accounts under the user making the request.
     */
    #[Api(optional: true)]
    public ?bool $managed_accounts;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Specifies the sort order for results.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    #[Api(optional: true)]
    public ?string $start_date;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Api(optional: true)]
    public ?string $authorization_bearer;

    /**
     * `new UsageReportListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageReportListParams::with(dimensions: ..., metrics: ..., product: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageReportListParams)
     *   ->withDimensions(...)
     *   ->withMetrics(...)
     *   ->withProduct(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $dimensions
     * @param list<string> $metrics
     * @param Format|value-of<Format> $format
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param list<string> $sort
     */
    public static function with(
        array $dimensions,
        array $metrics,
        string $product,
        ?string $date_range = null,
        ?string $end_date = null,
        ?string $filter = null,
        Format|string|null $format = null,
        ?bool $managed_accounts = null,
        Page|array|null $page = null,
        ?array $sort = null,
        ?string $start_date = null,
        ?string $authorization_bearer = null,
    ): self {
        $obj = new self;

        $obj['dimensions'] = $dimensions;
        $obj['metrics'] = $metrics;
        $obj['product'] = $product;

        null !== $date_range && $obj['date_range'] = $date_range;
        null !== $end_date && $obj['end_date'] = $end_date;
        null !== $filter && $obj['filter'] = $filter;
        null !== $format && $obj['format'] = $format;
        null !== $managed_accounts && $obj['managed_accounts'] = $managed_accounts;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;
        null !== $start_date && $obj['start_date'] = $start_date;
        null !== $authorization_bearer && $obj['authorization_bearer'] = $authorization_bearer;

        return $obj;
    }

    /**
     * Breakout by specified product dimensions.
     *
     * @param list<string> $dimensions
     */
    public function withDimensions(array $dimensions): self
    {
        $obj = clone $this;
        $obj['dimensions'] = $dimensions;

        return $obj;
    }

    /**
     * Specified product usage values.
     *
     * @param list<string> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $obj = clone $this;
        $obj['metrics'] = $metrics;

        return $obj;
    }

    /**
     * Telnyx product.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

        return $obj;
    }

    /**
     * A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     */
    public function withDateRange(string $dateRange): self
    {
        $obj = clone $this;
        $obj['date_range'] = $dateRange;

        return $obj;
    }

    /**
     * The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj['end_date'] = $endDate;

        return $obj;
    }

    /**
     * Filter records on dimensions.
     */
    public function withFilter(string $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Specify the response format (csv or json). JSON is returned by default, even if not specified.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }

    /**
     * Return the aggregations for all Managed Accounts under the user making the request.
     */
    public function withManagedAccounts(bool $managedAccounts): self
    {
        $obj = clone $this;
        $obj['managed_accounts'] = $managedAccounts;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Specifies the sort order for results.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    public function withStartDate(string $startDate): self
    {
        $obj = clone $this;
        $obj['start_date'] = $startDate;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj['authorization_bearer'] = $authorizationBearer;

        return $obj;
    }
}
