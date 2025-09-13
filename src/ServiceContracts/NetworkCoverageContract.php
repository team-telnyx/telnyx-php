<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Page;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NetworkCoverageContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code]
     * @param Filters $filters Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NetworkCoverageListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $filters = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): NetworkCoverageListResponse;
}
