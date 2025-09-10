<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentHealthContract;

use const Telnyx\Core\OMIT as omit;

final class GlobalIPAssignmentHealthService implements GlobalIPAssignmentHealthContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Global IP Assignment Health Check Metrics
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in]
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentHealthGetResponse {
        [$parsed, $options] = GlobalIPAssignmentHealthRetrieveParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_assignment_health',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentHealthGetResponse::class,
        );
    }
}
