<?php

declare(strict_types=1);

namespace Telnyx\CallReasons;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
 *
 * @phpstan-type BrandedCallingPaginationMetaShape = array{
 *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
 * }
 */
final class BrandedCallingPaginationMeta implements BaseModel
{
    /** @use SdkModel<BrandedCallingPaginationMetaShape> */
    use SdkModel;

    /**
     * 1-based index of this page. Echoes the `page[number]` query parameter (default `1`).
     */
    #[Required('page_number')]
    public int $pageNumber;

    /**
     * Number of items returned in this page's `data` array. Capped at 250.
     */
    #[Required('page_size')]
    public int $pageSize;

    /**
     * Total number of pages available given the current `page_size`.
     */
    #[Required('total_pages')]
    public int $totalPages;

    /**
     * Total number of items across all pages (excludes soft-deleted rows).
     */
    #[Required('total_results')]
    public int $totalResults;

    /**
     * `new BrandedCallingPaginationMeta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandedCallingPaginationMeta::with(
     *   pageNumber: ..., pageSize: ..., totalPages: ..., totalResults: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandedCallingPaginationMeta)
     *   ->withPageNumber(...)
     *   ->withPageSize(...)
     *   ->withTotalPages(...)
     *   ->withTotalResults(...)
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
        int $pageNumber,
        int $pageSize,
        int $totalPages,
        int $totalResults
    ): self {
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['totalPages'] = $totalPages;
        $self['totalResults'] = $totalResults;

        return $self;
    }

    /**
     * 1-based index of this page. Echoes the `page[number]` query parameter (default `1`).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items returned in this page's `data` array. Capped at 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Total number of pages available given the current `page_size`.
     */
    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    /**
     * Total number of items across all pages (excludes soft-deleted rows).
     */
    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
