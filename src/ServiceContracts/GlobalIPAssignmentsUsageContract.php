<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams;
use Telnyx\RequestOptions;

interface GlobalIPAssignmentsUsageContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPAssignmentsUsageRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentsUsageRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentsUsageGetResponse;
}
