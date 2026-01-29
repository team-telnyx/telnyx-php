<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Page;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;

/**
 * Lists the phone numbers jobs.
 *
 * @see Telnyx\Services\PhoneNumbers\JobsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\Jobs\JobListParams\Page
 *
 * @phpstan-type JobListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class JobListParams implements BaseModel
{
    /** @use SdkModel<JobListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     * @param Page|PageShape|null $page
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

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
