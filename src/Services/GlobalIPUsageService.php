<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPUsageContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPUsageService implements GlobalIPUsageContract
{
    /**
     * @api
     */
    public GlobalIPUsageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPUsageRawService($client);
    }

    /**
     * @api
     *
     * Global IP Usage Metrics
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPUsageGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
