<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\StorageContract;
use Telnyx\Services\Storage\BucketsService;
use Telnyx\Services\Storage\MigrationSourcesService;
use Telnyx\Services\Storage\MigrationsService;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class StorageService implements StorageContract
{
    /**
     * @api
     */
    public StorageRawService $raw;

    /**
     * @api
     */
    public BucketsService $buckets;

    /**
     * @api
     */
    public MigrationSourcesService $migrationSources;

    /**
     * @api
     */
    public MigrationsService $migrations;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StorageRawService($client);
        $this->buckets = new BucketsService($client);
        $this->migrationSources = new MigrationSourcesService($client);
        $this->migrations = new MigrationsService($client);
    }

    /**
     * @api
     *
     * List Migration Source coverage
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listMigrationSourceCoverage(
        RequestOptions|array|null $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listMigrationSourceCoverage(requestOptions: $requestOptions);

        return $response->parse();
    }
}
