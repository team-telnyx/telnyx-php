<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentHealthRawContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPAssignmentHealthRawService implements GlobalIPAssignmentHealthRawContract
{
    // @phpstan-ignore-next-line
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
     *   filter?: Filter|FilterShape
     * }|GlobalIPAssignmentHealthRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPAssignmentHealthGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentHealthRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
