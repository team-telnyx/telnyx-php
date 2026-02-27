<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsUsageContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPAssignmentsUsageService implements GlobalIPAssignmentsUsageContract
{
    /**
     * @api
     */
    public GlobalIPAssignmentsUsageRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPAssignmentsUsageRawService($client);
    }

    /**
     * @api
     *
     * Global IP Assignment Usage Metrics
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPAssignmentsUsageGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
