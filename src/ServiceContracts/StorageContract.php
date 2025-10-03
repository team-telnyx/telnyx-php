<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

interface StorageContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse;
}
