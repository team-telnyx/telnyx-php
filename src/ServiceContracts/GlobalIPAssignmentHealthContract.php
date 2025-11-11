<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;
use Telnyx\RequestOptions;

interface GlobalIPAssignmentHealthContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPAssignmentHealthRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentHealthRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPAssignmentHealthGetResponse;
}
