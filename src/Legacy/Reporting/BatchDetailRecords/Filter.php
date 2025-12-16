<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CldFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\CliFilter;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Filter\FilterType;

/**
 * Query filter criteria. Note: The first filter object must specify filter_type as 'and'. You cannot follow an 'or' with another 'and'.
 *
 * @phpstan-type FilterShape = array{
 *   billingGroup?: string|null,
 *   cld?: string|null,
 *   cldFilter?: null|CldFilter|value-of<CldFilter>,
 *   cli?: string|null,
 *   cliFilter?: null|CliFilter|value-of<CliFilter>,
 *   filterType?: null|FilterType|value-of<FilterType>,
 *   tagsList?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Billing group UUID to filter by.
     */
    #[Optional('billing_group')]
    public ?string $billingGroup;

    /**
     * Called line identification (destination number).
     */
    #[Optional]
    public ?string $cld;

    /**
     * Filter type for CLD matching.
     *
     * @var value-of<CldFilter>|null $cldFilter
     */
    #[Optional('cld_filter', enum: CldFilter::class)]
    public ?string $cldFilter;

    /**
     * Calling line identification (caller ID).
     */
    #[Optional]
    public ?string $cli;

    /**
     * Filter type for CLI matching.
     *
     * @var value-of<CliFilter>|null $cliFilter
     */
    #[Optional('cli_filter', enum: CliFilter::class)]
    public ?string $cliFilter;

    /**
     * Logical operator for combining filters.
     *
     * @var value-of<FilterType>|null $filterType
     */
    #[Optional('filter_type', enum: FilterType::class)]
    public ?string $filterType;

    /**
     * Tag name to filter by.
     */
    #[Optional('tags_list')]
    public ?string $tagsList;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CldFilter|value-of<CldFilter> $cldFilter
     * @param CliFilter|value-of<CliFilter> $cliFilter
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        ?string $billingGroup = null,
        ?string $cld = null,
        CldFilter|string|null $cldFilter = null,
        ?string $cli = null,
        CliFilter|string|null $cliFilter = null,
        FilterType|string|null $filterType = null,
        ?string $tagsList = null,
    ): self {
        $self = new self;

        null !== $billingGroup && $self['billingGroup'] = $billingGroup;
        null !== $cld && $self['cld'] = $cld;
        null !== $cldFilter && $self['cldFilter'] = $cldFilter;
        null !== $cli && $self['cli'] = $cli;
        null !== $cliFilter && $self['cliFilter'] = $cliFilter;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $tagsList && $self['tagsList'] = $tagsList;

        return $self;
    }

    /**
     * Billing group UUID to filter by.
     */
    public function withBillingGroup(string $billingGroup): self
    {
        $self = clone $this;
        $self['billingGroup'] = $billingGroup;

        return $self;
    }

    /**
     * Called line identification (destination number).
     */
    public function withCld(string $cld): self
    {
        $self = clone $this;
        $self['cld'] = $cld;

        return $self;
    }

    /**
     * Filter type for CLD matching.
     *
     * @param CldFilter|value-of<CldFilter> $cldFilter
     */
    public function withCldFilter(CldFilter|string $cldFilter): self
    {
        $self = clone $this;
        $self['cldFilter'] = $cldFilter;

        return $self;
    }

    /**
     * Calling line identification (caller ID).
     */
    public function withCli(string $cli): self
    {
        $self = clone $this;
        $self['cli'] = $cli;

        return $self;
    }

    /**
     * Filter type for CLI matching.
     *
     * @param CliFilter|value-of<CliFilter> $cliFilter
     */
    public function withCliFilter(CliFilter|string $cliFilter): self
    {
        $self = clone $this;
        $self['cliFilter'] = $cliFilter;

        return $self;
    }

    /**
     * Logical operator for combining filters.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Tag name to filter by.
     */
    public function withTagsList(string $tagsList): self
    {
        $self = clone $this;
        $self['tagsList'] = $tagsList;

        return $self;
    }
}
