<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;

interface MobileNetworkOperatorsContract
{
    /**
     * @api
     *
     * @param array{
     *   countryCode?: string,
     *   mcc?: string,
     *   mnc?: string,
     *   name?: array{contains?: string, endsWith?: string, startsWith?: string},
     *   networkPreferencesEnabled?: bool,
     *   tadig?: string,
     * } $filter Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<MobileNetworkOperatorListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
