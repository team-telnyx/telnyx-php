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
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $totalPages && $self['totalPages'] = $totalPages;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    /**
     * Current Page based on pagination settings (included when defaults are used.).
     */
    public function withPageNumber(float $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results to return per page based on pagination settings (included when defaults are used.).
     */
    public function withPageSize(float $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Total number of pages based on pagination settings.
     */
    public function withTotalPages(float $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    /**
     * Total number of results.
     */
    public function withTotalResults(float $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
