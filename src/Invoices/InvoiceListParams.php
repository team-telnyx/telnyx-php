<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Invoices\InvoiceListParams\Sort;

/**
 * Retrieve a paginated list of invoices.
 *
 * @see Telnyx\Services\InvoicesService::list()
 *
 * @phpstan-type InvoiceListParamsShape = array{
 *   page_number_?: int, page_size_?: int, sort?: Sort|value-of<Sort>
 * }
 */
final class InvoiceListParams implements BaseModel
{
    /** @use SdkModel<InvoiceListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
    public ?int $page_size_;

    /**
     * Specifies the sort order for results.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Api(enum: Sort::class, optional: true)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        Sort|string|null $sort = null
    ): self {
        $obj = new self;

        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }

    /**
     * Specifies the sort order for results.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
