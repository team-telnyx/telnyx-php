<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

interface StorageContract
{
    /**
     * @api
     *
     * @return StorageListMigrationSourceCoverageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse;

    /**
     * @api
     *
     * @return StorageListMigrationSourceCoverageResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listMigrationSourceCoverageRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse;
}
