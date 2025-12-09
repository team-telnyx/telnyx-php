<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActionRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\ActionType;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Filter\Status;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Page;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementListParams\Sort\Value;

/**
 * Returns a list of action requirements for a specific porting order.
 *
 * @see Telnyx\Services\PortingOrders\ActionRequirementsService::list()
 *
 * @phpstan-type ActionRequirementListParamsShape = array{
 *   filter?: Filter|array{
 *     id?: list<string>|null,
 *     actionType?: value-of<ActionType>|null,
 *     requirementTypeID?: string|null,
 *     status?: value-of<Status>|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|array{value?: value-of<Value>|null},
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
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     */
    #[Optional]
    public ?Sort $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   id?: list<string>|null,
     *   actionType?: value-of<ActionType>|null,
     *   requirementTypeID?: string|null,
     *   status?: value-of<Status>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|array{value?: value-of<Value>|null} $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[id][in][], filter[requirement_type_id], filter[action_type], filter[status].
     *
     * @param Filter|array{
     *   id?: list<string>|null,
     *   actionType?: value-of<ActionType>|null,
     *   requirementTypeID?: string|null,
     *   status?: value-of<Status>|null,
     * } $filter
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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     *
     * @param Sort|array{value?: value-of<Value>|null} $sort
     */
    public function withSort(Sort|array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
