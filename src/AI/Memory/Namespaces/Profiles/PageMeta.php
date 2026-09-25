<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Where a listing's page sits in the whole.
 *
 * A page is a snapshot: the counts it reports and the order it is drawn in
 * both move as writes land, so paging through a busy namespace can repeat or
 * miss an entry at a page boundary.
 *
 * @phpstan-type PageMetaShape = array{
 *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
 * }
 */
final class PageMeta implements BaseModel
{
    /** @use SdkModel<PageMetaShape> */
    use SdkModel;

    /**
     * The page returned, counting from 1.
     */
    #[Required('page_number')]
    public int $pageNumber;

    /**
     * How many results a page holds.
     */
    #[Required('page_size')]
    public int $pageSize;

    /**
     * Pages that can be requested; 0 when nothing matched. Page until `page_number` reaches it rather than until a page comes back short: a page can hold fewer than `page_size` results without being the last. Capped at the deepest page served, so on a very large listing it covers fewer results than `total_results`.
     */
    #[Required('total_pages')]
    public int $totalPages;

    /**
     * Results the request matched, including any past the deepest page.
     */
    #[Required('total_results')]
    public int $totalResults;

    /**
     * `new PageMeta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageMeta::with(
     *   pageNumber: ..., pageSize: ..., totalPages: ..., totalResults: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageMeta)
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
     * The page returned, counting from 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * How many results a page holds.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Pages that can be requested; 0 when nothing matched. Page until `page_number` reaches it rather than until a page comes back short: a page can hold fewer than `page_size` results without being the last. Capped at the deepest page served, so on a very large listing it covers fewer results than `total_results`.
     */
    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    /**
     * Results the request matched, including any past the deepest page.
     */
    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
