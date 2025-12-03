<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentHealthContract;

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
     * @param array{
     *   filter?: array{
     *     global_ip_assignment_id?: string|array{in?: string},
     *     global_ip_id?: string|array{in?: string},
     *   },
     * }|GlobalIPAssignmentHealthRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentHealthRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentHealthGetResponse {
        [$parsed, $options] = GlobalIPAssignmentHealthRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ip_assignment_health',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentHealthGetResponse::class,
        );
    }
}
