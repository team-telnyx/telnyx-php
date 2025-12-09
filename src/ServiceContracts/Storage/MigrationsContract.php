<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

interface MigrationsContract
{
    /**
     * @api
     *
     * @param string $sourceID ID of the Migration Source from which to migrate data
     * @param string $targetBucketName Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     * @param string $targetRegion telnyx Cloud Storage region to migrate the data to
     * @param bool $refresh if true, will continue to poll the source bucket to ensure new data is continually migrated over
     *
     * @throws APIException
     */
    public function create(
        string $sourceID,
        string $targetBucketName,
        string $targetRegion,
        ?bool $refresh = null,
        ?RequestOptions $requestOptions = null,
    ): MigrationNewResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationListResponse;
}
