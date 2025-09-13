<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAllowedPortsContract;

final class GlobalIPAllowedPortsService implements GlobalIPAllowedPortsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Global IP Allowed Ports
     *
     * @return GlobalIPAllowedPortListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPAllowedPortListResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return GlobalIPAllowedPortListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAllowedPortListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_allowed_ports',
            options: $requestOptions,
            convert: GlobalIPAllowedPortListResponse::class,
        );
    }
}
