<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort;

/**
 * Returns a list of all associated phone numbers for a porting order. Associated phone numbers are used for partial porting in GB to specify which phone numbers should be kept or disconnected.
 *
 * @see Telnyx\Services\PortingOrders\AssociatedPhoneNumbersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort
 *
 * @phpstan-type AssociatedPhoneNumberListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|SortShape,
 * }
 */
final class AssociatedPhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action].
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     */
    #[Optional]
    public ?Sort $sort;

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
     * @param Sort|SortShape|null $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[action].
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
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     *
     * @param Sort|SortShape $sort
     */
    public function withSort(Sort|array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
