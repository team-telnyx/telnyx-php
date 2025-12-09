<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\ActivationStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\PortabilityStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\PortingOrderSingleStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\UnionMember1;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort\Value;

/**
 * Returns a list of all phone number blocks of a porting order.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberBlocksService::list()
 *
 * @phpstan-type PhoneNumberBlockListParamsShape = array{
 *   filter?: Filter|array{
 *     activationStatus?: value-of<ActivationStatus>|null,
 *     phoneNumber?: list<string>|null,
 *     portabilityStatus?: value-of<PortabilityStatus>|null,
 *     portingOrderID?: list<string>|null,
 *     status?: null|list<value-of<UnionMember1>>|value-of<PortingOrderSingleStatus>,
 *     supportKey?: string|null|list<string>,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|array{value?: value-of<Value>|null},
 * }
 */
final class PhoneNumberBlockListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberBlockListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status].
     */
    #[Optional]
    public ?Filter $filter;

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
     *   activationStatus?: value-of<ActivationStatus>|null,
     *   phoneNumber?: list<string>|null,
     *   portabilityStatus?: value-of<PortabilityStatus>|null,
     *   portingOrderID?: list<string>|null,
     *   status?: list<value-of<UnionMember1>>|value-of<PortingOrderSingleStatus>|null,
     *   supportKey?: string|list<string>|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|array{value?: value-of<Value>|null} $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status].
     *
     * @param Filter|array{
     *   activationStatus?: value-of<ActivationStatus>|null,
     *   phoneNumber?: list<string>|null,
     *   portabilityStatus?: value-of<PortabilityStatus>|null,
     *   portingOrderID?: list<string>|null,
     *   status?: list<value-of<UnionMember1>>|value-of<PortingOrderSingleStatus>|null,
     *   supportKey?: string|list<string>|null,
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
     * Consolidated sort parameter (deepObject style). Originally: sort[value].
     *
     * @param Sort|array{value?: value-of<Value>|null} $sort
     */
    public function withSort(Sort|array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
