<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams;
use Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VirtualCrossConnectsCoverageRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VirtualCrossConnectsCoverageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VirtualCrossConnectsCoverageListResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        array|VirtualCrossConnectsCoverageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
