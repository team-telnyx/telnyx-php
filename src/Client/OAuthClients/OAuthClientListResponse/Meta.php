<?php

declare(strict_types=1);

namespace Telnyx\Client\OAuthClients\OAuthClientListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{
 *   pageNumber?: int, pageSize?: int, totalPages?: int, totalResults?: int
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    /**
     * Current page number.
     */
    #[Api('page_number', optional: true)]
    public ?int $pageNumber;

    /**
     * Number of items per page.
     */
    #[Api('page_size', optional: true)]
    public ?int $pageSize;

    /**
     * Total number of pages.
     */
    #[Api('total_pages', optional: true)]
    public ?int $totalPages;

    /**
     * Total number of results.
     */
    #[Api('total_results', optional: true)]
    public ?int $totalResults;

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
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?int $totalPages = null,
        ?int $totalResults = null,
    ): self {
        $obj = new self;

        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;
        null !== $totalPages && $obj->totalPages = $totalPages;
        null !== $totalResults && $obj->totalResults = $totalResults;

        return $obj;
    }

    /**
     * Current page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * Number of items per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages.
     */
    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj->totalPages = $totalPages;

        return $obj;
    }

    /**
     * Total number of results.
     */
    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj->totalResults = $totalResults;

        return $obj;
    }
}
