<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

use const Telnyx\Core\OMIT as omit;

interface MigrationSourcesContract
{
    /**
     * @api
     *
     * @param string $bucketName bucket name to migrate the data from
     * @param Provider|value-of<Provider> $provider Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     * @param ProviderAuth $providerAuth
     * @param string $sourceRegion for intra-Telnyx buckets migration, specify the source bucket region in this field
     *
     * @return MigrationSourceNewResponse<HasRawResponse>
     */
    public function create(
        $bucketName,
        $provider,
        $providerAuth,
        $sourceRegion = omit,
        ?RequestOptions $requestOptions = null,
    ): MigrationSourceNewResponse;

    /**
     * @api
     *
     * @return MigrationSourceGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceGetResponse;

    /**
     * @api
     *
     * @return MigrationSourceListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationSourceListResponse;

    /**
     * @api
     *
     * @return MigrationSourceDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceDeleteResponse;
}
