<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InventoryCoverage\InventoryCoverageListParams;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse;
use Telnyx\RequestOptions;

interface InventoryCoverageContract
{
    /**
     * @api
     *
     * @param array<mixed>|InventoryCoverageListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InventoryCoverageListParams $params,
        ?RequestOptions $requestOptions = null,
    ): InventoryCoverageListResponse;
}
