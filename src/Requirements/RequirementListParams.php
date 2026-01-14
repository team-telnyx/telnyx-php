<?php

declare(strict_types=1);

namespace Telnyx\Requirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Sort;

/**
 * List all requirements with filtering, sorting, and pagination.
 *
 * @see Telnyx\Services\RequirementsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Requirements\RequirementListParams\Filter
 *
 * @phpstan-type RequirementListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: list<Sort|value-of<Sort>>|null,
 * }
 */
final class RequirementListParams implements BaseModel
{
    /** @use SdkModel<RequirementListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action].
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Consolidated sort parameter for requirements (deepObject style). Originally: sort[].
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
     * @param list<Sort|value-of<Sort>>|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

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
     * Consolidated sort parameter for requirements (deepObject style). Originally: sort[].
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
