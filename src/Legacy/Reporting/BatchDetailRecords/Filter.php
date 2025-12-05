<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;

/**
 * Query filter criteria. Note: The first filter object must specify filter_type as 'and'. You cannot follow an 'or' with another 'and'.
 *
 * @phpstan-type FilterShape = array{
 *   billing_group?: string|null,
 *   cld?: string|null,
 *   cld_filter?: value-of<CldFilter>|null,
 *   cli?: string|null,
 *   cli_filter?: value-of<CliFilter>|null,
 *   filter_type?: value-of<FilterType>|null,
 *   tags_list?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Billing group UUID to filter by.
     */
    #[Api(optional: true)]
    public ?string $billing_group;

    /**
     * Called line identification (destination number).
     */
    #[Api(optional: true)]
    public ?string $cld;

    /**
     * Filter type for CLD matching.
     *
     * @var value-of<CldFilter>|null $cld_filter
     */
    #[Api(enum: CldFilter::class, optional: true)]
    public ?string $cld_filter;

    /**
     * Calling line identification (caller ID).
     */
    #[Api(optional: true)]
    public ?string $cli;

    /**
     * Filter type for CLI matching.
     *
     * @var value-of<CliFilter>|null $cli_filter
     */
    #[Api(enum: CliFilter::class, optional: true)]
    public ?string $cli_filter;

    /**
     * Logical operator for combining filters.
     *
     * @var value-of<FilterType>|null $filter_type
     */
    #[Api(enum: FilterType::class, optional: true)]
    public ?string $filter_type;

    /**
     * Tag name to filter by.
     */
    #[Api(optional: true)]
    public ?string $tags_list;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CldFilter|value-of<CldFilter> $cld_filter
     * @param CliFilter|value-of<CliFilter> $cli_filter
     * @param FilterType|value-of<FilterType> $filter_type
     */
    public static function with(
        ?string $billing_group = null,
        ?string $cld = null,
        CldFilter|string|null $cld_filter = null,
        ?string $cli = null,
        CliFilter|string|null $cli_filter = null,
        FilterType|string|null $filter_type = null,
        ?string $tags_list = null,
    ): self {
        $obj = new self;

        null !== $billing_group && $obj['billing_group'] = $billing_group;
        null !== $cld && $obj['cld'] = $cld;
        null !== $cld_filter && $obj['cld_filter'] = $cld_filter;
        null !== $cli && $obj['cli'] = $cli;
        null !== $cli_filter && $obj['cli_filter'] = $cli_filter;
        null !== $filter_type && $obj['filter_type'] = $filter_type;
        null !== $tags_list && $obj['tags_list'] = $tags_list;

        return $obj;
    }

    /**
     * Billing group UUID to filter by.
     */
    public function withBillingGroup(string $billingGroup): self
    {
        $obj = clone $this;
        $obj['billing_group'] = $billingGroup;

        return $obj;
    }

    /**
     * Called line identification (destination number).
     */
    public function withCld(string $cld): self
    {
        $obj = clone $this;
        $obj['cld'] = $cld;

        return $obj;
    }

    /**
     * Filter type for CLD matching.
     *
     * @param CldFilter|value-of<CldFilter> $cldFilter
     */
    public function withCldFilter(CldFilter|string $cldFilter): self
    {
        $obj = clone $this;
        $obj['cld_filter'] = $cldFilter;

        return $obj;
    }

    /**
     * Calling line identification (caller ID).
     */
    public function withCli(string $cli): self
    {
        $obj = clone $this;
        $obj['cli'] = $cli;

        return $obj;
    }

    /**
     * Filter type for CLI matching.
     *
     * @param CliFilter|value-of<CliFilter> $cliFilter
     */
    public function withCliFilter(CliFilter|string $cliFilter): self
    {
        $obj = clone $this;
        $obj['cli_filter'] = $cliFilter;

        return $obj;
    }

    /**
     * Logical operator for combining filters.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filter_type'] = $filterType;

        return $obj;
    }

    /**
     * Tag name to filter by.
     */
    public function withTagsList(string $tagsList): self
    {
        $obj = clone $this;
        $obj['tags_list'] = $tagsList;

        return $obj;
    }
}
