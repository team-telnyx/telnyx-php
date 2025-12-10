<?php

declare(strict_types=1);

namespace Telnyx\DefaultPaginationForLogMessages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{pageNumber: int, totalPages: int}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('page_number')]
    public int $pageNumber;

    #[Required('total_pages')]
    public int $totalPages;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(pageNumber: ..., totalPages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withPageNumber(...)->withTotalPages(...)
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
    public static function with(int $pageNumber, int $totalPages): self
    {
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['totalPages'] = $totalPages;

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
}
