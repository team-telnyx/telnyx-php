<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworkCoverageContract;

final class NetworkCoverageService implements NetworkCoverageContract
{
    /**
     * @api
     */
    public NetworkCoverageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NetworkCoverageRawService($client);
    }

    /**
     * @api
     *
     * List all locations and the interfaces that region supports
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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $filters = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): NetworkCoverageListResponse {
        $params = ['filter' => $filter, 'filters' => $filters, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
