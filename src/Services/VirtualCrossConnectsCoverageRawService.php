<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsCoverageRawContract;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;
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
final class VirtualCrossConnectsCoverageRawService implements VirtualCrossConnectsCoverageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List Virtual Cross Connects Cloud Coverage.<br /><br />This endpoint shows which cloud regions are available for the `location_code` your Virtual Cross Connect will be provisioned in.
     *
     * @param array{
     *   filter?: Filter|FilterShape,
     *   filters?: Filters|FiltersShape,
     *   page?: Page|PageShape,
     * }|VirtualCrossConnectsCoverageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<VirtualCrossConnectsCoverageListResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectsCoverageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VirtualCrossConnectsCoverageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'virtual_cross_connects_coverage',
            query: $parsed,
            options: $options,
            convert: VirtualCrossConnectsCoverageListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
