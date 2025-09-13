<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationsContract;
use Telnyx\Services\Storage\Migrations\ActionsService;
use Telnyx\Storage\Migrations\MigrationCreateParams;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

use const Telnyx\Core\OMIT as omit;

final class MigrationsService implements MigrationsContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
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
     *
     * @return MigrationNewResponse<HasRawResponse>
     */
    public function create(
        $sourceID,
        $targetBucketName,
        $targetRegion,
        $refresh = omit,
        ?RequestOptions $requestOptions = null,
    ): MigrationNewResponse {
        [$parsed, $options] = MigrationCreateParams::parseRequest(
            [
                'sourceID' => $sourceID,
                'targetBucketName' => $targetBucketName,
                'targetRegion' => $targetRegion,
                'refresh' => $refresh,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'storage/migrations',
            body: (object) $parsed,
            options: $options,
            convert: MigrationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a Migration
     *
     * @return MigrationGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['storage/migrations/%1$s', $id],
            options: $requestOptions,
            convert: MigrationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Migrations
     *
     * @return MigrationListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'storage/migrations',
            options: $requestOptions,
            convert: MigrationListResponse::class,
        );
    }
}
