<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationsContract;
use Telnyx\Services\Storage\Migrations\ActionsService;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

/**
 * Migrate data from an external provider into Telnyx Cloud Storage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MigrationsService implements MigrationsContract
{
    /**
     * @api
     */
    public MigrationsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MigrationsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Initiate a migration of data from an external provider into Telnyx Cloud Storage. Currently, only S3 is supported.
     *
     * @param string $sourceID ID of the Migration Source from which to migrate data
     * @param string $targetBucketName Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     * @param string $targetRegion telnyx Cloud Storage region to migrate the data to
     * @param bool $refresh if true, will continue to poll the source bucket to ensure new data is continually migrated over
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $sourceID,
        string $targetBucketName,
        string $targetRegion,
        ?bool $refresh = null,
        RequestOptions|array|null $requestOptions = null,
    ): MigrationNewResponse {
        $params = Util::removeNulls(
            [
                'sourceID' => $sourceID,
                'targetBucketName' => $targetBucketName,
                'targetRegion' => $targetRegion,
                'refresh' => $refresh,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a Migration
     *
     * @param string $id unique identifier for the data migration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MigrationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Migrations
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): MigrationListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
