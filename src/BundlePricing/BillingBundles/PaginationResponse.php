<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationResponseShape = array{
 *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
 * }
 */
final class PaginationResponse implements BaseModel
{
    /** @use SdkModel<PaginationResponseShape> */
    use SdkModel;

    /**
     * The current page number.
     */
    #[Required('page_number')]
    public int $pageNumber;

    /**
     * The number of results per page.
     */
    #[Required('page_size')]
    public int $pageSize;

    /**
     * Total number of pages from the results.
     */
    #[Required('total_pages')]
    public int $totalPages;

    /**
     * Total number of results returned.
     */
    #[Required('total_results')]
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
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['totalPages'] = $totalPages;
        $self['totalResults'] = $totalResults;

        return $self;
    }

    /**
     * The current page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Total number of pages from the results.
     */
    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    /**
     * Total number of results returned.
     */
    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
