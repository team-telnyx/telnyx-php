<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

interface VirtualCrossConnectsCoverageContract
{
    /**
     * @api
     *
     * @param array<mixed>|VirtualCrossConnectsCoverageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectsCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VirtualCrossConnectsCoverageListResponse;
}
