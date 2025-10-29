<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{
 *   pageNumber?: float, pageSize?: float, totalPages?: float, totalResults?: float
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    #[Api('page_number', optional: true)]
    public ?float $pageNumber;

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    #[Api('page_size', optional: true)]
    public ?float $pageSize;

    /**
     * Total number of pages based on pagination settings.
     */
    #[Api('total_pages', optional: true)]
    public ?float $totalPages;

    /**
     * Total number of results.
     */
    #[Api('total_results', optional: true)]
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

        null !== $pageNumber && $obj->pageNumber = $pageNumber;
        null !== $pageSize && $obj->pageSize = $pageSize;
        null !== $totalPages && $obj->totalPages = $totalPages;
        null !== $totalResults && $obj->totalResults = $totalResults;

        return $obj;
    }

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    public function withPageNumber(float $pageNumber): self
    {
        $obj = clone $this;
        $obj->pageNumber = $pageNumber;

        return $obj;
    }

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    public function withPageSize(float $pageSize): self
    {
        $obj = clone $this;
        $obj->pageSize = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages based on pagination settings.
     */
    public function withTotalPages(float $totalPages): self
    {
        $obj = clone $this;
        $obj->totalPages = $totalPages;

        return $obj;
    }

    /**
     * Total number of results.
     */
    public function withTotalResults(float $totalResults): self
    {
        $obj = clone $this;
        $obj->totalResults = $totalResults;

        return $obj;
    }
}
