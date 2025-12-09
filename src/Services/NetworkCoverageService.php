<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NetworkCoverage\AvailableService;
use Telnyx\NetworkCoverage\NetworkCoverageListParams;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NetworkCoverageContract;

final class NetworkCoverageService implements NetworkCoverageContract
{
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
     *   filter?: array{
     *     locationCode?: string,
     *     locationPop?: string,
     *     locationRegion?: string,
     *     locationSite?: string,
     *   },
     *   filters?: array{
     *     availableServices?: 'cloud_vpn'|'private_wireless_gateway'|'virtual_cross_connect'|AvailableService|array{
     *       contains?: 'cloud_vpn'|'private_wireless_gateway'|'virtual_cross_connect'|AvailableService,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NetworkCoverageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NetworkCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkCoverageListResponse {
        [$parsed, $options] = NetworkCoverageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<NetworkCoverageListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'network_coverage',
            query: $parsed,
            options: $options,
            convert: NetworkCoverageListResponse::class,
        );

        return $response->parse();
    }
}
