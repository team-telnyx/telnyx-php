<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface GlobalIPAssignmentsUsageContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[global_ip_assignment_id][in], filter[global_ip_id][in]
     *
     * @return GlobalIPAssignmentsUsageGetResponse<HasRawResponse>
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): GlobalIPAssignmentsUsageGetResponse;
}
