<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NetworkCoverage\NetworkCoverageListParams;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters;
use Telnyx\NetworkCoverage\NetworkCoverageListParams\Page;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworkCoverageRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filter
 * @phpstan-import-type FiltersShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters
 * @phpstan-import-type PageShape from \Telnyx\NetworkCoverage\NetworkCoverageListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NetworkCoverageRawService implements NetworkCoverageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all locations and the interfaces that region supports
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   filters?: Filters|FiltersShape,
     *   page?: Page|PageShape,
     * }|NetworkCoverageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<NetworkCoverageListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkCoverageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NetworkCoverageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'network_coverage',
            query: $parsed,
            options: $options,
            convert: NetworkCoverageListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
