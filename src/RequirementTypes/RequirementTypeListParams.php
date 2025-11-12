<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\Core\Attributes\Api;
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
 * @phpstan-type RequirementTypeListParamsShape = array{
 *   filter?: Filter, sort?: list<Sort|value-of<Sort>>
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
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated sort parameter for requirement types (deepObject style). Originally: sort[].
     *
     * @var list<value-of<Sort>>|null $sort
     */
    #[Api(list: Sort::class, optional: true)]
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
     * @param list<Sort|value-of<Sort>> $sort
     */
    public static function with(?Filter $filter = null, ?array $sort = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated sort parameter for requirement types (deepObject style). Originally: sort[].
     *
     * @param list<Sort|value-of<Sort>> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
