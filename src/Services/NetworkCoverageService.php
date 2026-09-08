<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworkCoverageContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter
 * @phpstan-import-type FiltersShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
                'filters' => $filters ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
