<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPLatencyContract;

final class GlobalIPLatencyService implements GlobalIPLatencyContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Global IP Latency Metrics
     *
     * @param array{
     *   filter?: array{globalIPID?: string|array{in?: string}}
     * }|GlobalIPLatencyRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPLatencyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPLatencyGetResponse {
        [$parsed, $options] = GlobalIPLatencyRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPLatencyGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'global_ip_latency',
            query: $parsed,
            options: $options,
            convert: GlobalIPLatencyGetResponse::class,
        );

        return $response->parse();
    }
}
