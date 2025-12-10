<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NetworkCoverage\NetworkCoverageListParams;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;

interface NetworkCoverageRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|NetworkCoverageListParams $params
     *
     * @return BaseResponse<DefaultPagination<NetworkCoverageListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
