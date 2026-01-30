<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListParams\Filter;
use Telnyx\SimCards\SimCardListParams\Sort;

/**
 * Get all SIM cards belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\SimCardsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\SimCards\SimCardListParams\Filter
 *
 * @phpstan-type SimCardListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   filterSimCardGroupID?: string|null,
 *   includeSimCardGroup?: bool|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class SimCardListParams implements BaseModel
{
    /** @use SdkModel<SimCardListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[iccid], filter[msisdn], filter[status], filter[tags].
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

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

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
     * @param Filter|FilterShape|null $filter
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $filterSimCardGroupID = null,
        ?bool $includeSimCardGroup = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $filterSimCardGroupID && $self['filterSimCardGroupID'] = $filterSimCardGroupID;
        null !== $includeSimCardGroup && $self['includeSimCardGroup'] = $includeSimCardGroup;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter for SIM cards (deepObject style). Originally: filter[iccid], filter[msisdn], filter[status], filter[tags].
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

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

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
