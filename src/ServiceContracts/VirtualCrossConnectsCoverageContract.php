<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

interface VirtualCrossConnectsCoverageContract
{
    /**
     * @api
     *
     * @param array{
     *   cloudProvider?: 'aws'|'azure'|'gce'|CloudProvider,
     *   cloudProviderRegion?: string,
     *   locationCode?: string,
     *   locationPop?: string,
     *   locationRegion?: string,
     *   locationSite?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code]
     * @param array{
     *   availableBandwidth?: int|array{contains?: int}
     * } $filters Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<VirtualCrossConnectsCoverageListResponse>
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
