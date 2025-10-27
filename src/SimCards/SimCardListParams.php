<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Page;
use Telnyx\SimCards\SimCardListParams\Sort;

/**
 * Get all SIM cards belonging to the user that match the given filters.
 *
 * @see Telnyx\SimCards->list
 *
 * @phpstan-type sim_card_list_params = array{
 *   filter?: Filter,
 *   filterSimCardGroupID?: string,
 *   includeSimCardGroup?: bool,
 *   page?: Page,
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class SimCardListParams implements BaseModel
{
    /** @use SdkModel<sim_card_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * A valid SIM card group ID.
     */
    #[Api(optional: true)]
    public ?string $filterSimCardGroupID;

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    #[Api(optional: true)]
    public ?bool $includeSimCardGroup;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
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
        ?Filter $filter = null,
        ?string $filterSimCardGroupID = null,
        ?bool $includeSimCardGroup = null,
        ?Page $page = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $filterSimCardGroupID && $obj->filterSimCardGroupID = $filterSimCardGroupID;
        null !== $includeSimCardGroup && $obj->includeSimCardGroup = $includeSimCardGroup;
        null !== $page && $obj->page = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * A valid SIM card group ID.
     */
    public function withFilterSimCardGroupID(string $filterSimCardGroupID): self
    {
        $obj = clone $this;
        $obj->filterSimCardGroupID = $filterSimCardGroupID;

        return $obj;
    }

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    public function withIncludeSimCardGroup(bool $includeSimCardGroup): self
    {
        $obj = clone $this;
        $obj->includeSimCardGroup = $includeSimCardGroup;

        return $obj;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
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
