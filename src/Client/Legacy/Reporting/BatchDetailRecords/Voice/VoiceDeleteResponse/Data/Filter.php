<?php

declare(strict_types=1);

namespace Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse\Data;

use Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse\Data\Filter\CldFilter;
use Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse\Data\Filter\CliFilter;
use Telnyx\Client\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse\Data\Filter\FilterType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Query filter criteria. Note: The first filter object must specify filter_type as 'and'. You cannot follow an 'or' with another 'and'.
 *
 * @phpstan-type filter_alias = array{
 *   billingGroup?: string,
 *   cld?: string,
 *   cldFilter?: value-of<CldFilter>,
 *   cli?: string,
 *   cliFilter?: value-of<CliFilter>,
 *   filterType?: value-of<FilterType>,
 *   tagsList?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Billing group UUID to filter by.
     */
    #[Api('billing_group', optional: true)]
    public ?string $billingGroup;

    /**
     * Called line identification (destination number).
     */
    #[Api(optional: true)]
    public ?string $cld;

    /**
     * Filter type for CLD matching.
     *
     * @var value-of<CldFilter>|null $cldFilter
     */
    #[Api('cld_filter', enum: CldFilter::class, optional: true)]
    public ?string $cldFilter;

    /**
     * Calling line identification (caller ID).
     */
    #[Api(optional: true)]
    public ?string $cli;

    /**
     * Filter type for CLI matching.
     *
     * @var value-of<CliFilter>|null $cliFilter
     */
    #[Api('cli_filter', enum: CliFilter::class, optional: true)]
    public ?string $cliFilter;

    /**
     * Logical operator for combining filters.
     *
     * @var value-of<FilterType>|null $filterType
     */
    #[Api('filter_type', enum: FilterType::class, optional: true)]
    public ?string $filterType;

    /**
     * Tag name to filter by.
     */
    #[Api('tags_list', optional: true)]
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
        $obj = new self;

        null !== $billingGroup && $obj->billingGroup = $billingGroup;
        null !== $cld && $obj->cld = $cld;
        null !== $cldFilter && $obj->cldFilter = $cldFilter instanceof CldFilter ? $cldFilter->value : $cldFilter;
        null !== $cli && $obj->cli = $cli;
        null !== $cliFilter && $obj->cliFilter = $cliFilter instanceof CliFilter ? $cliFilter->value : $cliFilter;
        null !== $filterType && $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;
        null !== $tagsList && $obj->tagsList = $tagsList;

        return $obj;
    }

    /**
     * Billing group UUID to filter by.
     */
    public function withBillingGroup(string $billingGroup): self
    {
        $obj = clone $this;
        $obj->billingGroup = $billingGroup;

        return $obj;
    }

    /**
     * Called line identification (destination number).
     */
    public function withCld(string $cld): self
    {
        $obj = clone $this;
        $obj->cld = $cld;

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
        $obj->cldFilter = $cldFilter instanceof CldFilter ? $cldFilter->value : $cldFilter;

        return $obj;
    }

    /**
     * Calling line identification (caller ID).
     */
    public function withCli(string $cli): self
    {
        $obj = clone $this;
        $obj->cli = $cli;

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
        $obj->cliFilter = $cliFilter instanceof CliFilter ? $cliFilter->value : $cliFilter;

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
        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;

        return $obj;
    }

    /**
     * Tag name to filter by.
     */
    public function withTagsList(string $tagsList): self
    {
        $obj = clone $this;
        $obj->tagsList = $tagsList;

        return $obj;
    }
}
