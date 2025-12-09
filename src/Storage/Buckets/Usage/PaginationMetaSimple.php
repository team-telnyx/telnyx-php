<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationMetaSimpleShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   totalPages?: int|null,
 *   totalResults?: int|null,
 * }
 */
final class PaginationMetaSimple implements BaseModel
{
    /** @use SdkModel<PaginationMetaSimpleShape> */
    use SdkModel;

    #[Optional('page_number')]
    public ?int $pageNumber;

    #[Optional('page_size')]
    public ?int $pageSize;

    #[Optional('total_pages')]
    public ?int $totalPages;

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

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj['pageNumber'] = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj['totalPages'] = $totalPages;

        return $obj;
    }

    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj['totalResults'] = $totalResults;

        return $obj;
    }
}
