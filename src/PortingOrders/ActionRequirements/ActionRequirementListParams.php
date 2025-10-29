<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Page;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;

/**
 * Returns a list of action requirements for a specific porting order.
 *
 * @see Telnyx\PortingOrders\ActionRequirements->list
 *
 * @phpstan-type ActionRequirementListParamsShape = array{
 *   filter?: Filter, page?: Page, sort?: Sort
 * }
 */
final class ActionRequirementListParams implements BaseModel
{
    /** @use SdkModel<ActionRequirementListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     */
    #[Api(optional: true)]
    public ?Sort $sort;

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
        ?Filter $filter = null,
        ?Page $page = null,
        ?Sort $sort = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;
        null !== $sort && $obj->sort = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status].
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
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     */
    public function withSort(Sort $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }
}
