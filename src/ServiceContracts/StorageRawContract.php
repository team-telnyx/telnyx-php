<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

interface StorageRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<StorageListMigrationSourceCoverageResponse>
     *
     * @throws APIException
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
