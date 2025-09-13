<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports\MdrUsageReportListResponse;

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

    #[Api('page_number', optional: true)]
    public ?int $pageNumber;

    #[Api('page_size', optional: true)]
    public ?int $pageSize;

    #[Api('total_pages', optional: true)]
    public ?int $totalPages;

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
