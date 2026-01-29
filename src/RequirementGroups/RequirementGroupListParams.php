<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter;

/**
 * List requirement groups.
 *
 * @see Telnyx\Services\RequirementGroupsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\RequirementGroups\RequirementGroupListParams\Filter
 *
 * @phpstan-type RequirementGroupListParamsShape = array{
 *   filter?: null|Filter|FilterShape
 * }
 */
final class RequirementGroupListParams implements BaseModel
{
    /** @use SdkModel<RequirementGroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference].
     */
    #[Optional]
    public ?Filter $filter;

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
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
