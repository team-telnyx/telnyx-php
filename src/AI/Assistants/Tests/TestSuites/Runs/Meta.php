<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{
 *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    #[Api('page_number')]
    public int $pageNumber;

    #[Api('page_size')]
    public int $pageSize;

    #[Api('total_pages')]
    public int $totalPages;

    #[Api('total_results')]
    public int $totalResults;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(pageNumber: ..., pageSize: ..., totalPages: ..., totalResults: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)
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

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj->totalPages = $totalPages;

        return $obj;
    }

    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj->totalResults = $totalResults;

        return $obj;
    }
}
