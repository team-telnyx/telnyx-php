<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[start_time], filter[end_time].
 *
 * @phpstan-type filter_alias = array{
 *   endTime: \DateTimeInterface, startTime: \DateTimeInterface
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The end time of the period to filter the usage (ISO microsecond format).
     */
    #[Api('end_time')]
    public \DateTimeInterface $endTime;

    /**
     * The start time of the period to filter the usage (ISO microsecond format).
     */
    #[Api('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * `new Filter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Filter::with(endTime: ..., startTime: ...)
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
        \DateTimeInterface $endTime,
        \DateTimeInterface $startTime
    ): self {
        $obj = new self;

        $obj->endTime = $endTime;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * The end time of the period to filter the usage (ISO microsecond format).
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * The start time of the period to filter the usage (ISO microsecond format).
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }
}
