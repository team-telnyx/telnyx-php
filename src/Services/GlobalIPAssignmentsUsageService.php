<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return GlobalIPAssignmentsUsageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentsUsageGetResponse {
        $params = ['filter' => $filter];

        return $this->retrieveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return GlobalIPAssignmentsUsageGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentsUsageGetResponse {
        [$parsed, $options] = GlobalIPAssignmentsUsageRetrieveParams::parseRequest(
            $params,
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
