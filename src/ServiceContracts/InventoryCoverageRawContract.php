<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InventoryCoverage\InventoryCoverageListParams;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InventoryCoverageRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|InventoryCoverageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InventoryCoverageListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|InventoryCoverageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
