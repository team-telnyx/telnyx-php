<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsCoverageContract;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter
 * @phpstan-import-type FiltersShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filters
 * @phpstan-import-type PageShape from \Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VirtualCrossConnectsCoverageService implements VirtualCrossConnectsCoverageContract
{
    /**
     * @api
     */
    public VirtualCrossConnectsCoverageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VirtualCrossConnectsCoverageRawService($client);
    }

    /**
     * @api
     *
     * List Virtual Cross Connects Cloud Coverage.<br /><br />This endpoint shows which cloud regions are available for the `location_code` your Virtual Cross Connect will be provisioned in.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[cloud_provider], filter[cloud_provider_region], filter[location.region], filter[location.site], filter[location.pop], filter[location.code]
     * @param Filters|FiltersShape $filters Consolidated filters parameter (deepObject style). Originally: filters[available_bandwidth][contains]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<VirtualCrossConnectsCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Filters|array|null $filters = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            ['filter' => $filter, 'filters' => $filters, 'page' => $page]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
