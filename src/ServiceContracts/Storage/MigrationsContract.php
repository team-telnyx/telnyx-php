<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

use const Telnyx\Core\OMIT as omit;

interface MigrationsContract
{
    /**
     * @api
     *
     * @param string $sourceID ID of the Migration Source from which to migrate data
     * @param string $targetBucketName Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     * @param string $targetRegion telnyx Cloud Storage region to migrate the data to
     * @param bool $refresh if true, will continue to poll the source bucket to ensure new data is continually migrated over
     */
    public function create(
        $sourceID,
        $targetBucketName,
        $targetRegion,
        $refresh = omit,
        ?RequestOptions $requestOptions = null,
    ): MigrationNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationGetResponse;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationListResponse;
}
