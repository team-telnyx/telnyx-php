<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time].
 *
 * @phpstan-type FilterShape = array{
 *   end_time: \DateTimeInterface, start_time: \DateTimeInterface
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The end time of the period to filter the usage (ISO microsecond format).
     */
    #[Api]
    public \DateTimeInterface $end_time;

    /**
     * The start time of the period to filter the usage (ISO microsecond format).
     */
    #[Api]
    public \DateTimeInterface $start_time;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(end_time: ..., start_time: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Filter)->withEndTime(...)->withStartTime(...)
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
    public static function with(
        \DateTimeInterface $end_time,
        \DateTimeInterface $start_time
    ): self {
        $obj = new self;

        $obj['end_time'] = $end_time;
        $obj['start_time'] = $start_time;

        return $obj;
    }

    /**
     * The end time of the period to filter the usage (ISO microsecond format).
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * The start time of the period to filter the usage (ISO microsecond format).
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }
}
