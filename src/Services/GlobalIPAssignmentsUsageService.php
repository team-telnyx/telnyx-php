<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPAssignmentsUsageContract;

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
     * @param array{
     *   globalIPAssignmentID?: string|array{in?: string},
     *   globalIPID?: string|array{in?: string},
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentsUsageGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
