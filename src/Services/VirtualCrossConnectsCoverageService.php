<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsCoverageContract;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $filters = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectsCoverageListResponse {
        $params = Util::removeNulls(
            ['filter' => $filter, 'filters' => $filters, 'page' => $page]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
