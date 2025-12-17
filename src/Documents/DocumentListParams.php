<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Page;
use Telnyx\Documents\DocumentListParams\Sort;

/**
 * List all documents ordered by created_at descending.
 *
 * @see Telnyx\Services\DocumentsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Documents\DocumentListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Documents\DocumentListParams\Page
 *
 * @phpstan-type DocumentListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   page?: null|Page|PageShape,
 *   sort?: list<Sort|value-of<Sort>>|null,
 * }
 */
final class DocumentListParams implements BaseModel
{
    /** @use SdkModel<DocumentListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Consolidated sort parameter for documents (deepObject style). Originally: sort[].
     *
     * @var list<value-of<Sort>>|null $sort
     */
    #[Optional(list: Sort::class)]
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
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     * @param list<Sort|value-of<Sort>>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?array $sort = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated sort parameter for documents (deepObject style). Originally: sort[].
     *
     * @param list<Sort|value-of<Sort>> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
