<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Filter\Status;
use Telnyx\SimCards\SimCardListParams\Page;
use Telnyx\SimCards\SimCardListParams\Sort;

/**
 * Get all SIM cards belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\SimCardsService::list()
 *
 * @phpstan-type SimCardListParamsShape = array{
 *   filter?: Filter|array{
 *     iccid?: string|null,
 *     status?: list<value-of<Status>>|null,
 *     tags?: list<string>|null,
 *   },
 *   filter_sim_card_group_id_?: string,
 *   include_sim_card_group?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class SimCardListParams implements BaseModel
{
    /** @use SdkModel<SimCardListParamsShape> */
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
    public ?string $filter_sim_card_group_id_;

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    #[Api(optional: true)]
    public ?bool $include_sim_card_group;

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
     * @param Filter|array{
     *   iccid?: string|null,
     *   status?: list<value-of<Status>>|null,
     *   tags?: list<string>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $filter_sim_card_group_id_ = null,
        ?bool $include_sim_card_group = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $filter_sim_card_group_id_ && $obj['filter_sim_card_group_id_'] = $filter_sim_card_group_id_;
        null !== $include_sim_card_group && $obj['include_sim_card_group'] = $include_sim_card_group;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status].
     *
     * @param Filter|array{
     *   iccid?: string|null,
     *   status?: list<value-of<Status>>|null,
     *   tags?: list<string>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * A valid SIM card group ID.
     */
    public function withFilterSimCardGroupID(string $filterSimCardGroupID): self
    {
        $obj = clone $this;
        $obj['filter_sim_card_group_id_'] = $filterSimCardGroupID;

        return $obj;
    }

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    public function withIncludeSimCardGroup(bool $includeSimCardGroup): self
    {
        $obj = clone $this;
        $obj['include_sim_card_group'] = $includeSimCardGroup;

        return $obj;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

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
