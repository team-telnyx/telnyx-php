<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type pagination_response = array{
 *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
 * }
 */
final class PaginationResponse implements BaseModel
{
    /** @use SdkModel<pagination_response> */
    use SdkModel;

    /**
     * The current page number.
     */
    #[Api('page_number')]
    public int $pageNumber;

    /**
     * The number of results per page.
     */
    #[Api('page_size')]
    public int $pageSize;

    /**
     * Total number of pages from the results.
     */
    #[Api('total_pages')]
    public int $totalPages;

    /**
     * Total number of results returned.
     */
    #[Api('total_results')]
    public int $totalResults;

    /**
     * `new PaginationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaginationResponse::with(
     *   pageNumber: ..., pageSize: ..., totalPages: ..., totalResults: ...
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
        int $pageNumber,
        int $pageSize,
        int $totalPages,
        int $totalResults
    ): self {
        $obj = new self;

        $obj->pageNumber = $pageNumber;
        $obj->pageSize = $pageSize;
        $obj->totalPages = $totalPages;
        $obj->totalResults = $totalResults;

        return $obj;
    }

    /**
     * The current page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * The number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages from the results.
     */
    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj->totalPages = $totalPages;

        return $obj;
    }

    /**
     * Total number of results returned.
     */
    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj->totalResults = $totalResults;

        return $obj;
    }
}
