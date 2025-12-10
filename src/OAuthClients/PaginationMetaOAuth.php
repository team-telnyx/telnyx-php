<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationMetaOAuthShape = array{
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   totalPages?: int|null,
 *   totalResults?: int|null,
 * }
 */
final class PaginationMetaOAuth implements BaseModel
{
    /** @use SdkModel<PaginationMetaOAuthShape> */
    use SdkModel;

    /**
     * Current page number.
     */
    #[Optional('page_number')]
    public ?int $pageNumber;

    /**
     * Number of items per page.
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
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $totalPages && $self['totalPages'] = $totalPages;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    /**
     * Current page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items per page.
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
     * Total number of results.
     */
    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
