<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter;
use Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Page;

/**
 * Get a paginated list of number block orders.
 *
 * @see Telnyx\Services\NumberBlockOrdersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\NumberBlockOrders\NumberBlockOrderListParams\Page
 *
 * @phpstan-type NumberBlockOrderListParamsShape = array{
 *   filter?: null|Filter|FilterShape, page?: null|Page|PageShape
 * }
 */
final class NumberBlockOrderListParams implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number].
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
}
