<?php

declare(strict_types=1);

namespace Telnyx\Storage\Sqldbs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Sqldbs\SqldbListParams\FilterStatus;
use Telnyx\Storage\Sqldbs\SqldbListParams\Sort;

/**
 * Lists the SQL databases for the authenticated user's organization. Results use page-based pagination (`page[number]`/`page[size]`) and can be filtered and sorted.
 *
 * @see Telnyx\Services\Storage\SqldbsService::list()
 *
 * @phpstan-type SqldbListParamsShape = array{
 *   filterName?: string|null,
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class SqldbListParams implements BaseModel
{
    /** @use SdkModel<SqldbListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by exact name match.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Filter by provisioning status.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page. Values above 250 are treated as 250.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Sort field; prefix with `-` for descending order.
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
     * @param FilterStatus|value-of<FilterStatus>|null $filterStatus
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterName = null,
        FilterStatus|string|null $filterStatus = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter by exact name match.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Filter by provisioning status.
     *
     * @param FilterStatus|value-of<FilterStatus> $filterStatus
     */
    public function withFilterStatus(FilterStatus|string $filterStatus): self
    {
        $self = clone $this;
        $self['filterStatus'] = $filterStatus;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page. Values above 250 are treated as 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sort field; prefix with `-` for descending order.
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
