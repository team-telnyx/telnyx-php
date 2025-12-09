<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\Misc;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers;
use Telnyx\PortingOrders\PortingOrderListParams\Page;
use Telnyx\PortingOrders\PortingOrderListParams\Sort;
use Telnyx\PortingOrders\PortingOrderListParams\Sort\Value;

/**
 * Returns a list of your porting order.
 *
 * @see Telnyx\Services\PortingOrdersService::list()
 *
 * @phpstan-type PortingOrderListParamsShape = array{
 *   filter?: Filter|array{
 *     activationSettings?: ActivationSettings|null,
 *     customerGroupReference?: string|null,
 *     customerReference?: string|null,
 *     endUser?: EndUser|null,
 *     misc?: Misc|null,
 *     parentSupportKey?: string|null,
 *     phoneNumbers?: PhoneNumbers|null,
 *   },
 *   includePhoneNumbers?: bool,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|array{value?: value-of<Value>|null},
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     * @param Filter|array{
     *   activationSettings?: ActivationSettings|null,
     *   customerGroupReference?: string|null,
     *   customerReference?: string|null,
     *   endUser?: EndUser|null,
     *   misc?: Misc|null,
     *   parentSupportKey?: string|null,
     *   phoneNumbers?: PhoneNumbers|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|array{value?: value-of<Value>|null} $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?bool $includePhoneNumbers = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $includePhoneNumbers && $obj['includePhoneNumbers'] = $includePhoneNumbers;
        null !== $page && $obj['page'] = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains].
     *
     * @param Filter|array{
     *   activationSettings?: ActivationSettings|null,
     *   customerGroupReference?: string|null,
     *   customerReference?: string|null,
     *   endUser?: EndUser|null,
     *   misc?: Misc|null,
     *   parentSupportKey?: string|null,
     *   phoneNumbers?: PhoneNumbers|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Include the first 50 phone number objects in the results.
     */
    public function withIncludePhoneNumbers(bool $includePhoneNumbers): self
    {
        $obj = clone $this;
        $obj['includePhoneNumbers'] = $includePhoneNumbers;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     *
     * @param Sort|array{value?: value-of<Value>|null} $sort
     */
    public function withSort(Sort|array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
