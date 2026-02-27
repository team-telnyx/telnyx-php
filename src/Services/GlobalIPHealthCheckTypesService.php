<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPHealthCheckTypesContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPHealthCheckTypeListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
