<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NetworkCoverage\NetworkCoverageListParams;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;

interface NetworkCoverageContract
{
    /**
     * @api
     *
     * @param array<mixed>|NetworkCoverageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NetworkCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NetworkCoverageListResponse;
}
