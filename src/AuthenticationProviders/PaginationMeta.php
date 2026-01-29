<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationMetaShape = array{
 *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
 * }
 */
final class PaginationMeta implements BaseModel
{
    /** @use SdkModel<PaginationMetaShape> */
    use SdkModel;

    #[Required('page_number')]
    public int $pageNumber;

    #[Required('total_pages')]
    public int $totalPages;

    #[Optional('page_size')]
    public ?int $pageSize;

    #[Optional('total_results')]
    public ?int $totalResults;

    /**
     * `new PaginationMeta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaginationMeta::with(pageNumber: ..., totalPages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaginationMeta)->withPageNumber(...)->withTotalPages(...)
     * ```
     */
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
        int $pageNumber,
        int $totalPages,
        ?int $pageSize = null,
        ?int $totalResults = null,
    ): self {
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['totalPages'] = $totalPages;

        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
