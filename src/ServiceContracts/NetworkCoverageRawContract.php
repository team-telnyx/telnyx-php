<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\NetworkCoverage\NetworkCoverageListParams;
use Telnyx\NetworkCoverage\NetworkCoverageListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NetworkCoverageRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NetworkCoverageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NetworkCoverageListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkCoverageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
