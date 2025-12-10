<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Addresses\AddressListParams\Filter;
use Telnyx\Addresses\AddressListParams\Filter\AddressBook;
use Telnyx\Addresses\AddressListParams\Filter\CustomerReference\UnionMember1;
use Telnyx\Addresses\AddressListParams\Filter\StreetAddress;
use Telnyx\Addresses\AddressListParams\Page;
use Telnyx\Addresses\AddressListParams\Sort;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a list of your addresses.
 *
 * @see Telnyx\Services\AddressesService::list()
 *
 * @phpstan-type AddressListParamsShape = array{
 *   filter?: Filter|array{
 *     addressBook?: AddressBook|null,
 *     customerReference?: string|null|UnionMember1,
 *     streetAddress?: StreetAddress|null,
 *     usedAsEmergency?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class AddressListParams implements BaseModel
{
    /** @use SdkModel<AddressListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>street_address</code>: sorts the result by the
     *     <code>street_address</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-street_address</code>: sorts the result by the
     *     <code>street_address</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
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
     * @param Filter|array{
     *   addressBook?: AddressBook|null,
     *   customerReference?: string|UnionMember1|null,
     *   streetAddress?: StreetAddress|null,
     *   usedAsEmergency?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq].
     *
     * @param Filter|array{
     *   addressBook?: AddressBook|null,
     *   customerReference?: string|UnionMember1|null,
     *   streetAddress?: StreetAddress|null,
     *   usedAsEmergency?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
     * Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>street_address</code>: sorts the result by the
     *     <code>street_address</code> field in ascending order.
     *   </li>.
     *
     *   <li>
     *     <code>-street_address</code>: sorts the result by the
     *     <code>street_address</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
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
