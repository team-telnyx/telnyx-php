<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAllowedPortsContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPAllowedPortsService implements GlobalIPAllowedPortsContract
{
    /**
     * @api
     */
    public GlobalIPAllowedPortsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPAllowedPortsRawService($client);
    }

    /**
     * @api
     *
     * List all Global IP Allowed Ports
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPAllowedPortListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
