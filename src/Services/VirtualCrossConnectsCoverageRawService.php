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
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter\CloudProvider;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

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
     *   filter?: array{
     *     cloudProvider?: 'aws'|'azure'|'gce'|CloudProvider,
     *     cloudProviderRegion?: string,
     *     locationCode?: string,
     *     locationPop?: string,
     *     locationRegion?: string,
     *     locationSite?: string,
     *   },
     *   filters?: array{availableBandwidth?: int|array{contains?: int}},
     *   page?: array{number?: int, size?: int},
     * }|VirtualCrossConnectsCoverageListParams $params
     *
     * @return BaseResponse<DefaultPagination<VirtualCrossConnectsCoverageListResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectsCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
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
