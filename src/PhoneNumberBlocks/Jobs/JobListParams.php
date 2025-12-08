<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Status;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Type;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Page;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Sort;

/**
 * Lists the phone number blocks jobs.
 *
 * @see Telnyx\Services\PhoneNumberBlocks\JobsService::list()
 *
 * @phpstan-type JobListParamsShape = array{
 *   filter?: Filter|array{
 *     status?: value-of<Status>|null, type?: value-of<Type>|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|value-of<Sort>,
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
     * @param Filter|array{
     *   status?: value-of<Status>|null, type?: value-of<Type>|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[status].
     *
     * @param Filter|array{
     *   status?: value-of<Status>|null, type?: value-of<Type>|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
