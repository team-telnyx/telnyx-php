<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConnectionsPaginationMetaShape = array{
 *   page_number?: int|null,
 *   page_size?: int|null,
 *   total_pages?: int|null,
 *   total_results?: int|null,
 * }
 */
final class ConnectionsPaginationMeta implements BaseModel
{
    /** @use SdkModel<ConnectionsPaginationMetaShape> */
    use SdkModel;

    #[Optional]
    public ?int $page_number;

    #[Optional]
    public ?int $page_size;

    #[Optional]
    public ?int $total_pages;

    #[Optional]
    public ?int $total_results;

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
        ?int $page_number = null,
        ?int $page_size = null,
        ?int $total_pages = null,
        ?int $total_results = null,
    ): self {
        $obj = new self;

        null !== $page_number && $obj['page_number'] = $page_number;
        null !== $page_size && $obj['page_size'] = $page_size;
        null !== $total_pages && $obj['total_pages'] = $total_pages;
        null !== $total_results && $obj['total_results'] = $total_results;

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
