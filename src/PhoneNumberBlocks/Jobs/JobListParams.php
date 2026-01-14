<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;

/**
 * Lists the phone number blocks jobs.
 *
 * @see Telnyx\Services\PhoneNumberBlocks\JobsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter
 *
 * @phpstan-type JobListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class JobListParams implements BaseModel
{
    /** @use SdkModel<JobListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[status].
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[status].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

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

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
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
