<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

interface VirtualCrossConnectsCoverageRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VirtualCrossConnectsCoverageListParams $params
     *
     * @return BaseResponse<DefaultPagination<VirtualCrossConnectsCoverageListResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectsCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
