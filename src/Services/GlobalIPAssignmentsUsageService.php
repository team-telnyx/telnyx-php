<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsUsageContract;

use const Telnyx\Core\OMIT as omit;

final class GlobalIPAssignmentsUsageService implements GlobalIPAssignmentsUsageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Global IP Assignment Usage Metrics
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in]
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentsUsageGetResponse {
        [$parsed, $options] = GlobalIPAssignmentsUsageRetrieveParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_assignments_usage',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentsUsageGetResponse::class,
        );
    }
}
