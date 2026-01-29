<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;

/**
 * Returns the detail on API usage on a bucket of a particular time period, group by method category.
 *
 * @see Telnyx\Services\Storage\Buckets\UsageService::getAPIUsage()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter
 *
 * @phpstan-type UsageGetAPIUsageParamsShape = array{filter: Filter|FilterShape}
 */
final class UsageGetAPIUsageParams implements BaseModel
{
    /** @use SdkModel<UsageGetAPIUsageParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time].
     */
    #[Required]
    public Filter $filter;

    /**
     * `new UsageGetAPIUsageParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageGetAPIUsageParams::with(filter: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageGetAPIUsageParams)->withFilter(...)
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
     * @param Filter|FilterShape $filter
     */
    public static function with(Filter|array $filter): self
    {
        $self = new self;

        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
