<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{
 *   page_number?: float|null,
 *   page_size?: float|null,
 *   total_pages?: float|null,
 *   total_results?: float|null,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    #[Api(optional: true)]
    public ?float $page_number;

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    #[Api(optional: true)]
    public ?float $page_size;

    /**
     * Total number of pages based on pagination settings.
     */
    #[Api(optional: true)]
    public ?float $total_pages;

    /**
     * Total number of results.
     */
    #[Api(optional: true)]
    public ?float $total_results;

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
        ?float $page_number = null,
        ?float $page_size = null,
        ?float $total_pages = null,
        ?float $total_results = null,
    ): self {
        $obj = new self;

        null !== $page_number && $obj->page_number = $page_number;
        null !== $page_size && $obj->page_size = $page_size;
        null !== $total_pages && $obj->total_pages = $total_pages;
        null !== $total_results && $obj->total_results = $total_results;

        return $obj;
    }

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    public function withPageNumber(float $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number = $pageNumber;

        return $obj;
    }

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    public function withPageSize(float $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size = $pageSize;

        return $obj;
    }

    /**
     * Total number of pages based on pagination settings.
     */
    public function withTotalPages(float $totalPages): self
    {
        $obj = clone $this;
        $obj->total_pages = $totalPages;

        return $obj;
    }

    /**
     * Total number of results.
     */
    public function withTotalResults(float $totalResults): self
    {
        $obj = clone $this;
        $obj->total_results = $totalResults;

        return $obj;
    }
}
