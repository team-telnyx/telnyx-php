<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPHealthCheckTypesContract;

final class GlobalIPHealthCheckTypesService implements GlobalIPHealthCheckTypesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Global IP Health check types.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckTypeListResponse {
        /** @var BaseResponse<GlobalIPHealthCheckTypeListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'global_ip_health_check_types',
            options: $requestOptions,
            convert: GlobalIPHealthCheckTypeListResponse::class,
        );

        return $response->parse();
    }
}
