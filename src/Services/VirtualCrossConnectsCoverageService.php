<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VirtualCrossConnectsCoverageContract;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

final class VirtualCrossConnectsCoverageService implements VirtualCrossConnectsCoverageContract
{
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
     *     cloud_provider?: 'aws'|'azure'|'gce',
     *     cloud_provider_region?: string,
     *     'location.code'?: string,
     *     'location.pop'?: string,
     *     'location.region'?: string,
     *     'location.site'?: string,
     *   },
     *   filters?: array{available_bandwidth?: int|array{contains?: int}},
     *   page?: array{number?: int, size?: int},
     * }|VirtualCrossConnectsCoverageListParams $params
     *
     * @return DefaultPagination<VirtualCrossConnectsCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectsCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = VirtualCrossConnectsCoverageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
