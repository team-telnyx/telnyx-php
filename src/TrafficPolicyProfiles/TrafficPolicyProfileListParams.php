<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams\FilterType;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams\Sort;

/**
 * Get all traffic policy profiles belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\TrafficPolicyProfilesService::list()
 *
 * @phpstan-type TrafficPolicyProfileListParamsShape = array{
 *   filterService?: string|null,
 *   filterType?: null|FilterType|value-of<FilterType>,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class TrafficPolicyProfileListParams implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by service ID.
     */
    #[Optional]
    public ?string $filterService;

    /**
     * Filter by traffic policy profile type.
     *
     * @var value-of<FilterType>|null $filterType
     */
    #[Optional(enum: FilterType::class)]
    public ?string $filterType;

    /**
     * The page number to load.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * The size of the page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Sorts traffic policy profiles by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
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
     * @param FilterType|value-of<FilterType>|null $filterType
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $filterService = null,
        FilterType|string|null $filterType = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filterService && $self['filterService'] = $filterService;
        null !== $filterType && $self['filterType'] = $filterType;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter by service ID.
     */
    public function withFilterService(string $filterService): self
    {
        $self = clone $this;
        $self['filterService'] = $filterService;

        return $self;
    }

    /**
     * Filter by traffic policy profile type.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * The page number to load.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * The size of the page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Sorts traffic policy profiles by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
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
