<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentHealthContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPAssignmentHealthService implements GlobalIPAssignmentHealthContract
{
    /**
     * @api
     */
    public GlobalIPAssignmentHealthRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPAssignmentHealthRawService($client);
    }

    /**
     * @api
     *
     * Global IP Assignment Health Check Metrics
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPAssignmentHealthGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
