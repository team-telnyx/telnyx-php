<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

interface StorageContract
{
    /**
     * @api
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse;
}
