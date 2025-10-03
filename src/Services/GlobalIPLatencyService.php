<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPLatencyContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     *
     * @throws APIException
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPLatencyGetResponse {
        $params = ['filter' => $filter];

        return $this->retrieveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPLatencyGetResponse {
        [$parsed, $options] = GlobalIPLatencyRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_latency',
            query: $parsed,
            options: $options,
            convert: GlobalIPLatencyGetResponse::class,
        );
    }
}
