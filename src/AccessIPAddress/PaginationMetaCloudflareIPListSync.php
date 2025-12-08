<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationMetaCloudflareIPListSyncShape = array{
 *   page_number: int, page_size: int, total_pages: int, total_results: int
 * }
 */
final class PaginationMetaCloudflareIPListSync implements BaseModel
{
    /** @use SdkModel<PaginationMetaCloudflareIPListSyncShape> */
    use SdkModel;

    #[Required]
    public int $page_number;

    #[Required]
    public int $page_size;

    #[Required]
    public int $total_pages;

    #[Required]
    public int $total_results;

    /**
     * `new PaginationMetaCloudflareIPListSync()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaginationMetaCloudflareIPListSync::with(
     *   page_number: ..., page_size: ..., total_pages: ..., total_results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaginationMetaCloudflareIPListSync)
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

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['page_number'] = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['page_size'] = $pageSize;

        return $obj;
    }

    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj['total_pages'] = $totalPages;

        return $obj;
    }

    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj['total_results'] = $totalResults;

        return $obj;
    }
}
