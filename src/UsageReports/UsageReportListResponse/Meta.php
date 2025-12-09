<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   totalPages?: int|null,
 *   totalResults?: int|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * Selected page number.
     */
    #[Optional('page_number')]
    public ?int $pageNumber;

    /**
     * Records per single page.
     */
    #[Optional('page_size')]
    public ?int $pageSize;

    /**
     * Total number of pages.
     */
    #[Optional('total_pages')]
    public ?int $totalPages;

    /**
     * Total number of results.
     */
    #[Optional('total_results')]
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

        null !== $pageNumber && $obj['pageNumber'] = $pageNumber;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $totalPages && $obj['totalPages'] = $totalPages;
        null !== $totalResults && $obj['totalResults'] = $totalResults;

        return $obj;
    }

    /**
     * Selected page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['pageNumber'] = $pageNumber;

        return $obj;
    }

    /**
     * Records per single page.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages.
     */
    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj['totalPages'] = $totalPages;

        return $obj;
    }

    /**
     * Total number of results.
     */
    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj['totalResults'] = $totalResults;

        return $obj;
    }
}
