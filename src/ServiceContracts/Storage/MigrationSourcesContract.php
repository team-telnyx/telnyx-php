<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

interface MigrationSourcesContract
{
    /**
     * @api
     *
     * @param string $bucketName bucket name to migrate the data from
     * @param 'aws'|'telnyx'|Provider $provider Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     * @param array{accessKey?: string, secretAccessKey?: string} $providerAuth
     * @param string $sourceRegion for intra-Telnyx buckets migration, specify the source bucket region in this field
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        string|Provider $provider,
        array $providerAuth,
        ?string $sourceRegion = null,
        ?RequestOptions $requestOptions = null,
    ): MigrationSourceNewResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration source
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationSourceListResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration source
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceDeleteResponse;
}
