<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Pagination metadata returned with list responses.
 *
 * @phpstan-type VoiceDesignsPaginationMetaShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   totalPages?: int|null,
 *   totalResults?: int|null,
 * }
 */
final class VoiceDesignsPaginationMeta implements BaseModel
{
    /** @use SdkModel<VoiceDesignsPaginationMetaShape> */
    use SdkModel;

    /**
     * Current page number (1-based).
     */
    #[Optional('page_number')]
    public ?int $pageNumber;

    /**
     * Number of results per page.
     */
    #[Optional('page_size')]
    public ?int $pageSize;

    /**
     * Total number of pages.
     */
    #[Optional('total_pages')]
    public ?int $totalPages;

    /**
     * Total number of results across all pages.
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
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $totalPages && $self['totalPages'] = $totalPages;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    /**
     * Current page number (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Total number of pages.
     */
    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    /**
     * Total number of results across all pages.
     */
    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
