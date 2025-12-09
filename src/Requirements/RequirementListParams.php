<?php

declare(strict_types=1);

namespace Telnyx\Requirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Requirements\RequirementListParams\Filter;
use Telnyx\Requirements\RequirementListParams\Filter\Action;
use Telnyx\Requirements\RequirementListParams\Filter\PhoneNumberType;
use Telnyx\Requirements\RequirementListParams\Page;
use Telnyx\Requirements\RequirementListParams\Sort;

/**
 * List all requirements with filtering, sorting, and pagination.
 *
 * @see Telnyx\Services\RequirementsService::list()
 *
 * @phpstan-type RequirementListParamsShape = array{
 *   filter?: Filter|array{
 *     action?: value-of<Action>|null,
 *     countryCode?: string|null,
 *     phoneNumberType?: value-of<PhoneNumberType>|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: list<Sort|value-of<Sort>>,
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     * @param Filter|array{
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param list<Sort|value-of<Sort>> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?array $sort = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter for requirements (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action].
     *
     * @param Filter|array{
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
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
