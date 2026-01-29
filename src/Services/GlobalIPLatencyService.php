<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPLatencyContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPLatencyGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
