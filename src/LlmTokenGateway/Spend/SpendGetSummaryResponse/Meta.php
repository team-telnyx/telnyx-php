<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Spend\SpendGroupBy;

/**
 * @phpstan-type MetaShape = array{
 *   endDate: string,
 *   groupBy: string|SpendGroupBy|value-of<SpendGroupBy>,
 *   hasMore: bool,
 *   pageNumber: int,
 *   pageSize: int,
 *   snapshot: string,
 *   startDate: string,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('end_date')]
    public string $endDate;

    /**
     * Group by one request tag key. Keys starting with ltg_, telnyx_, litellm_ or cf_ (any case) are rejected.
     *
     * @var string|value-of<SpendGroupBy> $groupBy
     */
    #[Required('group_by', enum: SpendGroupBy::class)]
    public string $groupBy;

    #[Required('has_more')]
    public bool $hasMore;

    #[Required('page_number')]
    public int $pageNumber;

    #[Required('page_size')]
    public int $pageSize;

    #[Required]
    public string $snapshot;

    #[Required('start_date')]
    public string $startDate;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(
     *   endDate: ...,
     *   groupBy: ...,
     *   hasMore: ...,
     *   pageNumber: ...,
     *   pageSize: ...,
     *   snapshot: ...,
     *   startDate: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)
     *   ->withEndDate(...)
     *   ->withGroupBy(...)
     *   ->withHasMore(...)
     *   ->withPageNumber(...)
     *   ->withPageSize(...)
     *   ->withSnapshot(...)
     *   ->withStartDate(...)
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
     * @param string|SpendGroupBy|value-of<SpendGroupBy> $groupBy
     */
    public static function with(
        string $endDate,
        SpendGroupBy|string $groupBy,
        bool $hasMore,
        int $pageNumber,
        int $pageSize,
        string $snapshot,
        string $startDate,
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['groupBy'] = $groupBy;
        $self['hasMore'] = $hasMore;
        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['snapshot'] = $snapshot;
        $self['startDate'] = $startDate;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Group by one request tag key. Keys starting with ltg_, telnyx_, litellm_ or cf_ (any case) are rejected.
     *
     * @param string|SpendGroupBy|value-of<SpendGroupBy> $groupBy
     */
    public function withGroupBy(SpendGroupBy|string $groupBy): self
    {
        $self = clone $this;
        $self['groupBy'] = $groupBy;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withSnapshot(string $snapshot): self
    {
        $self = clone $this;
        $self['snapshot'] = $snapshot;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
