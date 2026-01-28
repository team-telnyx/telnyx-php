<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter
 * @phpstan-import-type FiltersShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NetworkCoverageContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[location.region], filter[location.site], filter[location.pop], filter[location.code]
     * @param Filters|FiltersShape $filters Consolidated filters parameter (deepObject style). Originally: filters[available_services][contains]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NetworkCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Filters|array|null $filters = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
