<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPLatencyContract;

final class GlobalIPLatencyService implements GlobalIPLatencyContract
{
    /**
     * @api
     */
    public GlobalIPLatencyRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPLatencyRawService($client);
    }

    /**
     * @api
     *
     * Global IP Latency Metrics
     *
     * @param array{
     *   globalIPID?: string|array{in?: string}
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): GlobalIPLatencyGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
