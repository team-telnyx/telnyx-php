<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UsageGetAPIUsageParams); // set properties as needed
 * $client->storage.buckets.usage->getAPIUsage(...$params->toArray());
 * ```
 * Returns the detail on API usage on a bucket of a particular time period, group by method category.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->storage.buckets.usage->getAPIUsage(...$params->toArray());`
 *
 * @see Telnyx\Storage\Buckets\Usage->getAPIUsage
 *
 * @phpstan-type usage_get_api_usage_params = array{filter: Filter}
 */
final class UsageGetAPIUsageParams implements BaseModel
{
    /** @use SdkModel<usage_get_api_usage_params> */
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
