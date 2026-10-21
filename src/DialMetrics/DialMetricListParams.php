<?php

declare(strict_types=1);

namespace Telnyx\DialMetrics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialMetrics\DialMetricListParams\Granularity;
use Telnyx\DialMetrics\DialMetricListParams\Sort;

/**
 * Returns dials-per-second (DPS) metrics for your account's outbound dials made with the Call Control `Dial` command and TeXML, as time buckets with dial counts, accepted and rejected dials, average and peak DPS, and the DPS limit in force.
 *
 * The result has one record per region per bucket, ordered by `start_time` and then `region`, newest first unless `sort=start_time`. Regions are never summed: the DPS limit is enforced per region, so a cross-region total cannot be compared with it.
 *
 * Only buckets that saw dials are returned. Treat a missing bucket as zero dials.
 *
 * Only complete 5-second windows are counted, and a window is counted about 15 seconds after it closes. The newest `granularity=second` record is therefore your live DPS, about 20 seconds old. Request the last minute or two with `sort=-start_time`; the first record of each `region` is that region's live rate (`page[limit]=1` would hide every region but one). If no recent record exists, the live rate is zero.
 *
 * Results are cursor paginated. Follow `meta.next`, or pass `meta.cursors.after` as `page[after]`, until `meta.next` is absent. No total count is returned.
 *
 * This endpoint is in development and can change before general availability.
 *
 * @see Telnyx\Services\DialMetricsService::list()
 *
 * @phpstan-type DialMetricListParamsShape = array{
 *   endTime: \DateTimeInterface,
 *   granularity: Granularity|value-of<Granularity>,
 *   startTime: \DateTimeInterface,
 *   pageAfter?: string|null,
 *   pageLimit?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class DialMetricListParams implements BaseModel
{
    /** @use SdkModel<DialMetricListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Exclusive end of the range, ISO 8601. Must be after `start_time`. Buckets that start before this time are returned.
     */
    #[Required]
    public \DateTimeInterface $endTime;

    /**
     * Bucket size. `second` returns 5-second buckets (the finest resolution) and is kept for the last 48 hours. `minute` and `hour` are kept for the last 30 days.
     *
     * @var value-of<Granularity> $granularity
     */
    #[Required(enum: Granularity::class)]
    public string $granularity;

    /**
     * Inclusive start of the range, ISO 8601 (for example `2026-09-29T12:00:00.000Z`). Buckets that start at or after this time are returned. Must not be older than the retention window of the chosen `granularity`.
     */
    #[Required]
    public \DateTimeInterface $startTime;

    /**
     * Opaque cursor from `meta.cursors.after` of the previous page. Do not parse or construct it. A cursor that matches no records returns an empty page whose `meta.cursors.after` and `meta.cursors.before` both echo the given cursor.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Maximum number of buckets per page. Values outside the range are clamped to 1-10,000.
     */
    #[Optional]
    public ?int $pageLimit;

    /**
     * Sort order of the buckets by `start_time`. `-start_time` (default) returns the newest first, `start_time` the oldest first. `region` follows the same direction for buckets with the same `start_time`. To read the live rate, use `granularity=second` and `sort=-start_time`, then take the first record of each `region`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    /**
     * `new DialMetricListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialMetricListParams::with(endTime: ..., granularity: ..., startTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialMetricListParams)
     *   ->withEndTime(...)
     *   ->withGranularity(...)
     *   ->withStartTime(...)
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
     * @param Granularity|value-of<Granularity> $granularity
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        \DateTimeInterface $endTime,
        Granularity|string $granularity,
        \DateTimeInterface $startTime,
        ?string $pageAfter = null,
        ?int $pageLimit = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        $self['endTime'] = $endTime;
        $self['granularity'] = $granularity;
        $self['startTime'] = $startTime;

        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageLimit && $self['pageLimit'] = $pageLimit;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Exclusive end of the range, ISO 8601. Must be after `start_time`. Buckets that start before this time are returned.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Bucket size. `second` returns 5-second buckets (the finest resolution) and is kept for the last 48 hours. `minute` and `hour` are kept for the last 30 days.
     *
     * @param Granularity|value-of<Granularity> $granularity
     */
    public function withGranularity(Granularity|string $granularity): self
    {
        $self = clone $this;
        $self['granularity'] = $granularity;

        return $self;
    }

    /**
     * Inclusive start of the range, ISO 8601 (for example `2026-09-29T12:00:00.000Z`). Buckets that start at or after this time are returned. Must not be older than the retention window of the chosen `granularity`.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Opaque cursor from `meta.cursors.after` of the previous page. Do not parse or construct it. A cursor that matches no records returns an empty page whose `meta.cursors.after` and `meta.cursors.before` both echo the given cursor.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Maximum number of buckets per page. Values outside the range are clamped to 1-10,000.
     */
    public function withPageLimit(int $pageLimit): self
    {
        $self = clone $this;
        $self['pageLimit'] = $pageLimit;

        return $self;
    }

    /**
     * Sort order of the buckets by `start_time`. `-start_time` (default) returns the newest first, `start_time` the oldest first. `region` follows the same direction for buckets with the same `start_time`. To read the live rate, use `granularity=second` and `sort=-start_time`, then take the first record of each `region`.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
