<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\RequestOptions;

interface GlobalIPAssignmentHealthContract
{
    /**
     * @api
     *
     * @param array{
     *   globalIPAssignmentID?: string|array{in?: string},
     *   globalIPID?: string|array{in?: string},
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in], filter[global_ip_assignment_id][in]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentHealthGetResponse;
}
