<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Page;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort;

/**
 * Returns a list of all phone number extensions of a porting order.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberExtensionsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort
 *
 * @phpstan-type PhoneNumberExtensionListParamsShape = array{
 *   filter?: FilterShape|null, page?: PageShape|null, sort?: SortShape|null
 * }
 */
final class PhoneNumberExtensionListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id].
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
     * @param FilterShape $filter
     * @param PageShape $page
     * @param SortShape $sort
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
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id].
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
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param PageShape $page
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
     * @param SortShape $sort
     */
    public function withSort(Sort|array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
