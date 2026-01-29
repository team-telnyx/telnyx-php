<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Page;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobileNetworkOperatorsContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled]
     * @param Page|PageShape $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<MobileNetworkOperatorListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
