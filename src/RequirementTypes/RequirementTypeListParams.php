<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementTypes\RequirementTypeListParams\Filter;
use Telnyx\RequirementTypes\RequirementTypeListParams\Sort;

/**
 * List all requirement types ordered by created_at descending.
 *
 * @see Telnyx\Services\RequirementTypesService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\RequirementTypes\RequirementTypeListParams\Filter
 *
 * @phpstan-type RequirementTypeListParamsShape = array{
 *   filter?: FilterShape|null, sort?: list<Sort|value-of<Sort>>|null
 * }
 */
final class RequirementTypeListParams implements BaseModel
{
    /** @use SdkModel<RequirementTypeListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated sort parameter for requirement types (deepObject style). Originally: sort[].
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
     * @param FilterShape $filter
     * @param list<Sort|value-of<Sort>> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?array $sort = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name].
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
     * Consolidated sort parameter for requirement types (deepObject style). Originally: sort[].
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
