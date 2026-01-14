<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter;
use Telnyx\PortingOrders\PortingOrderListParams\Sort;

/**
 * Returns a list of your porting order.
 *
 * @see Telnyx\Services\PortingOrdersService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PortingOrderListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PortingOrderListParams\Sort
 *
 * @phpstan-type PortingOrderListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   includePhoneNumbers?: bool|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sort?: null|Sort|SortShape,
 * }
 */
final class PortingOrderListParams implements BaseModel
{
    /** @use SdkModel<PortingOrderListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Include the first 50 phone number objects in the results.
     */
    #[Optional]
    public ?bool $includePhoneNumbers;

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
        ?bool $includePhoneNumbers = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $includePhoneNumbers && $self['includePhoneNumbers'] = $includePhoneNumbers;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains].
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
     * Include the first 50 phone number objects in the results.
     */
    public function withIncludePhoneNumbers(bool $includePhoneNumbers): self
    {
        $self = clone $this;
        $self['includePhoneNumbers'] = $includePhoneNumbers;

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
