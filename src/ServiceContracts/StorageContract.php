<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

interface StorageContract
{
    /**
     * @api
     *
     * @return StorageListMigrationSourceCoverageResponse<HasRawResponse>
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse;
}
