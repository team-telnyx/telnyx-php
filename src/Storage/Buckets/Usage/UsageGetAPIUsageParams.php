<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;

/**
 * Returns the detail on API usage on a bucket of a particular time period, group by method category.
 *
 * @see Telnyx\Services\Storage\Buckets\UsageService::getAPIUsage()
 *
 * @phpstan-type UsageGetAPIUsageParamsShape = array{filter: Filter}
 */
final class UsageGetAPIUsageParams implements BaseModel
{
    /** @use SdkModel<UsageGetAPIUsageParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time].
     */
    #[Api]
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
     */
    public static function with(Filter $filter): self
    {
        $obj = new self;

        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
