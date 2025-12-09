<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\StorageRawContract;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

final class StorageRawService implements StorageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List Migration Source coverage
     *
     * @return BaseResponse<StorageListMigrationSourceCoverageResponse>
     *
     * @throws APIException
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'storage/migration_source_coverage',
            options: $requestOptions,
            convert: StorageListMigrationSourceCoverageResponse::class,
        );
    }
}
