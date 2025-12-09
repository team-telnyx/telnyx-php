<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{
 *   pageNumber?: float|null,
 *   pageSize?: float|null,
 *   totalPages?: float|null,
 *   totalResults?: float|null,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    #[Optional('page_number')]
    public ?float $pageNumber;

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    #[Optional('page_size')]
    public ?float $pageSize;

    /**
     * Total number of pages based on pagination settings.
     */
    #[Optional('total_pages')]
    public ?float $totalPages;

    /**
     * Total number of results.
     */
    #[Optional('total_results')]
    public ?float $totalResults;

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
        ?float $pageNumber = null,
        ?float $pageSize = null,
        ?float $totalPages = null,
        ?float $totalResults = null,
    ): self {
        $obj = new self;

        null !== $pageNumber && $obj['pageNumber'] = $pageNumber;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $totalPages && $obj['totalPages'] = $totalPages;
        null !== $totalResults && $obj['totalResults'] = $totalResults;

        return $obj;
    }

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    public function withPageNumber(float $pageNumber): self
    {
        $obj = clone $this;
        $obj['pageNumber'] = $pageNumber;

        return $obj;
    }

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    public function withPageSize(float $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages based on pagination settings.
     */
    public function withTotalPages(float $totalPages): self
    {
        $obj = clone $this;
        $obj['totalPages'] = $totalPages;

        return $obj;
    }

    /**
     * Total number of results.
     */
    public function withTotalResults(float $totalResults): self
    {
        $obj = clone $this;
        $obj['totalResults'] = $totalResults;

        return $obj;
    }
}
