<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\TimeRange;

/**
 * @phpstan-import-type TimeRangeShape from \Telnyx\EmailEvents\TimeRange
 *
 * @phpstan-type MetaShape = array{
 *   pageSize: int, timeRange: TimeRange|TimeRangeShape, pageCursor?: string|null
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('page_size')]
    public int $pageSize;

    #[Required('time_range')]
    public TimeRange $timeRange;

    /**
     * Cursor for the next page, when more results are available.
     */
    #[Optional('page_cursor')]
    public ?string $pageCursor;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(pageSize: ..., timeRange: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withPageSize(...)->withTimeRange(...)
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
     * @param TimeRange|TimeRangeShape $timeRange
     */
    public static function with(
        int $pageSize,
        TimeRange|array $timeRange,
        ?string $pageCursor = null
    ): self {
        $self = new self;

        $self['pageSize'] = $pageSize;
        $self['timeRange'] = $timeRange;

        null !== $pageCursor && $self['pageCursor'] = $pageCursor;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * @param TimeRange|TimeRangeShape $timeRange
     */
    public function withTimeRange(TimeRange|array $timeRange): self
    {
        $self = clone $this;
        $self['timeRange'] = $timeRange;

        return $self;
    }

    /**
     * Cursor for the next page, when more results are available.
     */
    public function withPageCursor(string $pageCursor): self
    {
        $self = clone $this;
        $self['pageCursor'] = $pageCursor;

        return $self;
    }
}
