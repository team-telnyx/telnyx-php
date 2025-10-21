<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Invoices\InvoiceListParams\Page;
use Telnyx\Invoices\InvoiceListParams\Sort;

/**
 * Retrieve a paginated list of invoices.
 *
 * @see Telnyx\Invoices->list
 *
 * @phpstan-type invoice_list_params = array{
 *   page?: Page, sort?: Sort|value-of<Sort>
 * }
 */
final class InvoiceListParams implements BaseModel
{
    /** @use SdkModel<invoice_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

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
        ?Page $page = null,
        Sort|string|null $sort = null
    ): self {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

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
