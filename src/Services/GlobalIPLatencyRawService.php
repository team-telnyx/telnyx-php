<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPLatencyRawContract;

final class GlobalIPLatencyRawService implements GlobalIPLatencyRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<GlobalIPLatencyGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPLatencyRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GlobalIPLatencyRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ip_latency',
            query: $parsed,
            options: $options,
            convert: GlobalIPLatencyGetResponse::class,
        );
    }
}
