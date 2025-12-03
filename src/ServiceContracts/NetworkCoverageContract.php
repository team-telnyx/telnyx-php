<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
     * @return DefaultPagination<NetworkCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
