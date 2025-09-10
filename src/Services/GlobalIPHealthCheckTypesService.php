<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckTypeListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_health_check_types',
            options: $requestOptions,
            convert: GlobalIPHealthCheckTypeListResponse::class,
        );
    }
}
