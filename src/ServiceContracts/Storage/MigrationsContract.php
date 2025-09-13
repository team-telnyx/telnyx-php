<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return MigrationNewResponse<HasRawResponse>
     *
     * @throws APIException
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
     *
     * @param array<string, mixed> $params
     *
     * @return MigrationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MigrationNewResponse;

    /**
     * @api
     *
     * @return MigrationGetResponse<HasRawResponse>
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
     * @return MigrationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MigrationGetResponse;

    /**
     * @api
     *
     * @return MigrationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationListResponse;

    /**
     * @api
     *
     * @return MigrationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): MigrationListResponse;
}
