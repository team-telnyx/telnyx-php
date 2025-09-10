<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\StorageContract;
use Telnyx\Services\Storage\BucketsService;
use Telnyx\Services\Storage\MigrationSourcesService;
use Telnyx\Services\Storage\MigrationsService;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

final class StorageService implements StorageContract
{
    /**
     * @@api
     */
    public BucketsService $buckets;

    /**
     * @@api
     */
    public MigrationSourcesService $migrationSources;

    /**
     * @@api
     */
    public MigrationsService $migrations;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->buckets = new BucketsService($this->client);
        $this->migrationSources = new MigrationSourcesService($this->client);
        $this->migrations = new MigrationsService($this->client);
    }

    /**
     * @api
     *
     * List Migration Source coverage
     */
    public function listMigrationSourceCoverage(
        ?RequestOptions $requestOptions = null
    ): StorageListMigrationSourceCoverageResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'storage/migration_source_coverage',
            options: $requestOptions,
            convert: StorageListMigrationSourceCoverageResponse::class,
        );
    }
}
