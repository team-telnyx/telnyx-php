<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingPaginationMetaShape = array{
 *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
 * }
 */
final class MessagingPaginationMeta implements BaseModel
{
    /** @use SdkModel<MessagingPaginationMetaShape> */
    use SdkModel;

    #[Required('page_number')]
    public int $pageNumber;

    #[Required('page_size')]
    public int $pageSize;

    #[Required('total_pages')]
    public int $totalPages;

    #[Required('total_results')]
    public int $totalResults;

    /**
     * `new MessagingPaginationMeta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingPaginationMeta::with(
     *   pageNumber: ..., pageSize: ..., totalPages: ..., totalResults: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingPaginationMeta)
     *   ->withPageNumber(...)
     *   ->withPageSize(...)
     *   ->withTotalPages(...)
     *   ->withTotalResults(...)
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
        int $pageSize,
        int $totalPages,
        int $totalResults
    ): self {
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['totalPages'] = $totalPages;
        $self['totalResults'] = $totalResults;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
