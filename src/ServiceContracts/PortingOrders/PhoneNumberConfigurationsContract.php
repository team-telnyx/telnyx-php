<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PhoneNumberConfigurationShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams\PhoneNumberConfiguration
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberConfigurationsContract
{
    /**
     * @api
     *
     * @param list<PhoneNumberConfiguration|PhoneNumberConfigurationShape> $phoneNumberConfigurations
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?array $phoneNumberConfigurations = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberConfigurationNewResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PhoneNumberConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
