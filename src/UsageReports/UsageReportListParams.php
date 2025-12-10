<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UsageReports\UsageReportListParams\Format;

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
 *   pageNumber?: int,
 *   pageSize?: int,
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

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

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
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
        ?string $startDate = null,
        ?string $authorizationBearer = null,
    ): self {
        $self = new self;

        $self['dimensions'] = $dimensions;
        $self['metrics'] = $metrics;
        $self['product'] = $product;

        null !== $dateRange && $self['dateRange'] = $dateRange;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $filter && $self['filter'] = $filter;
        null !== $format && $self['format'] = $format;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $authorizationBearer && $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }

    /**
     * Breakout by specified product dimensions.
     *
     * @param list<string> $dimensions
     */
    public function withDimensions(array $dimensions): self
    {
        $self = clone $this;
        $self['dimensions'] = $dimensions;

        return $self;
    }

    /**
     * Specified product usage values.
     *
     * @param list<string> $metrics
     */
    public function withMetrics(array $metrics): self
    {
        $self = clone $this;
        $self['metrics'] = $metrics;

        return $self;
    }

    /**
     * Telnyx product.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * A more user-friendly way to specify the timespan you want to filter by. More options can be found in the Telnyx API Reference docs.
     */
    public function withDateRange(string $dateRange): self
    {
        $self = clone $this;
        $self['dateRange'] = $dateRange;

        return $self;
    }

    /**
     * The end date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Filter records on dimensions.
     */
    public function withFilter(string $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Specify the response format (csv or json). JSON is returned by default, even if not specified.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * Return the aggregations for all Managed Accounts under the user making the request.
     */
    public function withManagedAccounts(bool $managedAccounts): self
    {
        $self = clone $this;
        $self['managedAccounts'] = $managedAccounts;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Specifies the sort order for results.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * The start date for the time range you are interested in. The maximum time range is 31 days. Format: YYYY-MM-DDTHH:mm:ssZ.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $self = clone $this;
        $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }
}
