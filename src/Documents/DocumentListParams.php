<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Page;
use Telnyx\Documents\DocumentListParams\Sort;

/**
 * List all documents ordered by created_at descending.
 *
 * @see Telnyx\Documents->list
 *
 * @phpstan-type document_list_params = array{
 *   filter?: Filter, page?: Page, sort?: list<Sort|value-of<Sort>>
 * }
 */
final class DocumentListParams implements BaseModel
{
    /** @use SdkModel<document_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Consolidated sort parameter for documents (deepObject style). Originally: sort[].
     *
     * @var list<value-of<Sort>>|null $sort
     */
    #[Api(list: Sort::class, optional: true)]
    public ?array $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Sort|value-of<Sort>> $sort
     */
    public static function with(
        ?Filter $filter = null,
        ?Page $page = null,
        ?array $sort = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated sort parameter for documents (deepObject style). Originally: sort[].
     *
     * @param list<Sort|value-of<Sort>> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
