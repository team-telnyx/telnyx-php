<?php

declare(strict_types=1);

namespace Telnyx\PerPagePagination;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{page_number?: int|null, total_pages?: int|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $page_number;

    #[Api(optional: true)]
    public ?int $total_pages;

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
        ?int $total_pages = null
    ): self {
        $obj = new self;

        null !== $page_number && $obj->page_number = $page_number;
        null !== $total_pages && $obj->total_pages = $total_pages;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number = $pageNumber;

        return $obj;
    }

    public function withTotalPages(int $totalPages): self
    {
        $obj = clone $this;
        $obj->total_pages = $totalPages;

        return $obj;
    }
}
