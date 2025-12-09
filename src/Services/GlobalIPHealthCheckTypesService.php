<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPHealthCheckTypesContract;

final class GlobalIPHealthCheckTypesService implements GlobalIPHealthCheckTypesContract
{
    /**
     * @api
     */
    public GlobalIPHealthCheckTypesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPHealthCheckTypesRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
