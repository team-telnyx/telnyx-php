<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Page;
use Telnyx\SimCards\SimCardListParams\Sort;

/**
 * Get all SIM cards belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\SimCardsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\SimCards\SimCardListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCards\SimCardListParams\Page
 *
 * @phpstan-type SimCardListParamsShape = array{
 *   filter?: FilterShape|null,
 *   filterSimCardGroupID?: string|null,
 *   includeSimCardGroup?: bool|null,
 *   page?: PageShape|null,
 *   sort?: null|Sort|value-of<Sort>,
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
    #[Optional]
    public ?Filter $filter;

    /**
     * A valid SIM card group ID.
     */
    #[Optional]
    public ?string $filterSimCardGroupID;

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    #[Optional]
    public ?bool $includeSimCardGroup;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
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
     * @param FilterShape $filter
     * @param PageShape $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $filterSimCardGroupID = null,
        ?bool $includeSimCardGroup = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $filterSimCardGroupID && $self['filterSimCardGroupID'] = $filterSimCardGroupID;
        null !== $includeSimCardGroup && $self['includeSimCardGroup'] = $includeSimCardGroup;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[tags], filter[iccid], filter[status].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * A valid SIM card group ID.
     */
    public function withFilterSimCardGroupID(string $filterSimCardGroupID): self
    {
        $self = clone $this;
        $self['filterSimCardGroupID'] = $filterSimCardGroupID;

        return $self;
    }

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    public function withIncludeSimCardGroup(bool $includeSimCardGroup): self
    {
        $self = clone $this;
        $self['includeSimCardGroup'] = $includeSimCardGroup;

        return $self;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Sorts SIM cards by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
