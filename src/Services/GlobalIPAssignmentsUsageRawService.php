<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsUsageRawContract;

final class GlobalIPAssignmentsUsageRawService implements GlobalIPAssignmentsUsageRawContract
{
    // @phpstan-ignore-next-line
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
     *     globalIPAssignmentID?: string|array{in?: string},
     *     globalIPID?: string|array{in?: string},
     *   },
     * }|GlobalIPAssignmentsUsageRetrieveParams $params
     *
     * @return BaseResponse<GlobalIPAssignmentsUsageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentsUsageRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GlobalIPAssignmentsUsageRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ip_assignments_usage',
            query: $parsed,
            options: $options,
            convert: GlobalIPAssignmentsUsageGetResponse::class,
        );
    }
}
