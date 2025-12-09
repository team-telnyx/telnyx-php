<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;

interface NetworkCoverageContract
{
    /**
     * @api
     *
     * @param array{
     *   locationCode?: string,
     *   locationPop?: string,
     *   locationRegion?: string,
     *   locationSite?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code]
     * @param array{
     *   availableServices?: 'cloud_vpn'|'private_wireless_gateway'|'virtual_cross_connect'|AvailableService|array{
     *     contains?: 'cloud_vpn'|'private_wireless_gateway'|'virtual_cross_connect'|AvailableService,
     *   },
     * } $filters Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<NetworkCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $filters = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
