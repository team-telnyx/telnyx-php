<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort;

/**
 * Returns a list of phone number configurations paginated.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberConfigurationsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort
 *
 * @phpstan-type PhoneNumberConfigurationListParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   page?: null|Page|PageShape,
 *   sort?: null|Sort|SortShape,
 * }
 */
final class PhoneNumberConfigurationListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberConfigurationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][].
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
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     * @param Sort|SortShape|null $sort
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
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][].
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
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|PageShape $page
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
     * @param Sort|SortShape $sort
     */
    public function withSort(Sort|array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
