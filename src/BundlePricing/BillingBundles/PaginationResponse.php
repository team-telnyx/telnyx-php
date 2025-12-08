<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationResponseShape = array{
 *   page_number: int, page_size: int, total_pages: int, total_results: int
 * }
 */
final class PaginationResponse implements BaseModel
{
    /** @use SdkModel<PaginationResponseShape> */
    use SdkModel;

    /**
     * The current page number.
     */
    #[Required]
    public int $page_number;

    /**
     * The number of results per page.
     */
    #[Required]
    public int $page_size;

    /**
     * Total number of pages from the results.
     */
    #[Required]
    public int $total_pages;

    /**
     * Total number of results returned.
     */
    #[Required]
    public int $total_results;

    /**
     * `new PaginationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaginationResponse::with(
     *   page_number: ..., page_size: ..., total_pages: ..., total_results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaginationResponse)
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
        int $page_number,
        int $page_size,
        int $total_pages,
        int $total_results
    ): self {
        $obj = new self;

        $obj['page_number'] = $page_number;
        $obj['page_size'] = $page_size;
        $obj['total_pages'] = $total_pages;
        $obj['total_results'] = $total_results;

        return $obj;
    }

    /**
     * The current page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number'] = $pageNumber;

        return $obj;
    }

    /**
     * The number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size'] = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages from the results.
     */
    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj['total_pages'] = $totalPages;

        return $obj;
    }

    /**
     * Total number of results returned.
     */
    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj['total_results'] = $totalResults;

        return $obj;
    }
}
