<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAllowedPortsRawContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPAllowedPortsRawService implements GlobalIPAllowedPortsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Global IP Allowed Ports
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPAllowedPortListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ip_allowed_ports',
            options: $requestOptions,
            convert: GlobalIPAllowedPortListResponse::class,
        );
    }
}
