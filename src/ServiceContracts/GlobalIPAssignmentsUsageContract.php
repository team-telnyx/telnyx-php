<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface GlobalIPAssignmentsUsageContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): GlobalIPAssignmentsUsageGetResponse;
}
