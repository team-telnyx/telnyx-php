<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Cloudfs\CloudfListParams\FilterStatus;
use Telnyx\Storage\Cloudfs\CloudfListParams\Sort;

/**
 * Lists the CloudFS filesystems for the authenticated user's organization. Results use cursor-based pagination: fetch the next page by passing `meta.cursors.after` as `page[after]`, or follow the `meta.next` URL.
 *
 * @see Telnyx\Services\Storage\CloudfsService::list()
 *
 * @phpstan-type CloudfListParamsShape = array{
 *   filterName?: string|null,
 *   filterRegion?: string|null,
 *   filterStatus?: null|FilterStatus|value-of<FilterStatus>,
 *   pageAfter?: string|null,
 *   pageBefore?: string|null,
 *   pageLimit?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class CloudfListParams implements BaseModel
{
    /** @use SdkModel<CloudfListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return only the filesystem whose name matches exactly.
     */
    #[Optional]
    public ?string $filterName;

    /**
     * Return only filesystems in this region.
     */
    #[Optional]
    public ?string $filterRegion;

    /**
     * Return only filesystems with this status. Unrecognized values are ignored.
     *
     * @var value-of<FilterStatus>|null $filterStatus
     */
    #[Optional(enum: FilterStatus::class)]
    public ?string $filterStatus;

    /**
     * Opaque cursor from a previous response's `meta.cursors.after`; returns the page after it. Mutually exclusive with `page[before]`.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Opaque cursor from a previous response's `meta.cursors.before`; returns the page before it. Mutually exclusive with `page[after]`.
     */
    #[Optional]
    public ?string $pageBefore;

    /**
     * The number of filesystems to return per page. Values above 250 are treated as 250.
     */
    #[Optional]
    public ?int $pageLimit;

    /**
     * Sort order for the results: a field name for ascending, or the field name prefixed with `-` for descending.
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
        ?string $filterRegion = null,
        FilterStatus|string|null $filterStatus = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        ?int $pageLimit = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterName && $self['filterName'] = $filterName;
        null !== $filterRegion && $self['filterRegion'] = $filterRegion;
        null !== $filterStatus && $self['filterStatus'] = $filterStatus;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageBefore && $self['pageBefore'] = $pageBefore;
        null !== $pageLimit && $self['pageLimit'] = $pageLimit;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Return only the filesystem whose name matches exactly.
     */
    public function withFilterName(string $filterName): self
    {
        $self = clone $this;
        $self['filterName'] = $filterName;

        return $self;
    }

    /**
     * Return only filesystems in this region.
     */
    public function withFilterRegion(string $filterRegion): self
    {
        $self = clone $this;
        $self['filterRegion'] = $filterRegion;

        return $self;
    }

    /**
     * Return only filesystems with this status. Unrecognized values are ignored.
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
     * Opaque cursor from a previous response's `meta.cursors.after`; returns the page after it. Mutually exclusive with `page[before]`.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Opaque cursor from a previous response's `meta.cursors.before`; returns the page before it. Mutually exclusive with `page[after]`.
     */
    public function withPageBefore(string $pageBefore): self
    {
        $self = clone $this;
        $self['pageBefore'] = $pageBefore;

        return $self;
    }

    /**
     * The number of filesystems to return per page. Values above 250 are treated as 250.
     */
    public function withPageLimit(int $pageLimit): self
    {
        $self = clone $this;
        $self['pageLimit'] = $pageLimit;

        return $self;
    }

    /**
     * Sort order for the results: a field name for ascending, or the field name prefixed with `-` for descending.
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
