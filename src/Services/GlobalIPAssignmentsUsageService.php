<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsUsageContract;

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
     * @param array{
     *   filter?: array{
     *     global_ip_assignment_id?: string|array{in?: string},
     *     global_ip_id?: string|array{in?: string},
     *   },
     * }|GlobalIPAssignmentsUsageRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentsUsageRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentsUsageGetResponse {
        [$parsed, $options] = GlobalIPAssignmentsUsageRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<GlobalIPAssignmentsUsageGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'global_ip_assignments_usage',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentsUsageGetResponse::class,
        );

        return $response->parse();
    }
}
