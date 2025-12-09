<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   dateRange?: string,
 *   endDate?: string,
 *   filter?: string,
 *   format?: Format|value-of<Format>,
 *   managedAccounts?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: list<string>,
 *   startDate?: string,
 *   authorizationBearer?: string,
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
    #[Required(list: 'string')]
    public array $dimensions;

    /**
     * Specified product usage values.
     *
     * @var list<string> $metrics
     */
    #[Required(list: 'string')]
    public array $metrics;

    /**
     * Telnyx product.
     */
    #[Required]
    public string $product;

    /**
     * A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     */
    #[Optional]
    public ?string $dateRange;

    /**
     * The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Filter records on dimensions.
     */
    #[Optional]
    public ?string $filter;

    /**
     * Specify the response format (csv or json). JSON is returned by default, even if not specified.
     *
     * @var value-of<Format>|null $format
     */
    #[Optional(enum: Format::class)]
    public ?string $format;

    /**
     * Return the aggregations for all Managed Accounts under the user making the request.
     */
    #[Optional]
    public ?bool $managedAccounts;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Specifies the sort order for results.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Optional]
    public ?string $authorizationBearer;

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
        ?string $dateRange = null,
        ?string $endDate = null,
        ?string $filter = null,
        Format|string|null $format = null,
        ?bool $managedAccounts = null,
        Page|array|null $page = null,
        ?array $sort = null,
        ?string $startDate = null,
        ?string $authorizationBearer = null,
    ): self {
        $obj = new self;

        $obj['dimensions'] = $dimensions;
        $obj['metrics'] = $metrics;
        $obj['product'] = $product;

        null !== $dateRange && $obj['dateRange'] = $dateRange;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $filter && $obj['filter'] = $filter;
        null !== $format && $obj['format'] = $format;
        null !== $managedAccounts && $obj['managedAccounts'] = $managedAccounts;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;
        null !== $startDate && $obj['startDate'] = $startDate;
        null !== $authorizationBearer && $obj['authorizationBearer'] = $authorizationBearer;

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
        $obj['dateRange'] = $dateRange;

        return $obj;
    }

    /**
     * The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

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
        $obj['managedAccounts'] = $managedAccounts;

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
        $obj['startDate'] = $startDate;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj['authorizationBearer'] = $authorizationBearer;

        return $obj;
    }
}
