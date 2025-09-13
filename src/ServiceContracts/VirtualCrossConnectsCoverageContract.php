<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

use const Telnyx\Core\OMIT as omit;

interface VirtualCrossConnectsCoverageContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code]
     * @param Filters $filters Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return VirtualCrossConnectsCoverageListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $filters = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectsCoverageListResponse;
}
