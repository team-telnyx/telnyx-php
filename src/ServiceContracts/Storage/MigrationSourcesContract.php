<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

/**
 * @phpstan-import-type ProviderAuthShape from \Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MigrationSourcesContract
{
    /**
     * @api
     *
     * @param string $bucketName bucket name to migrate the data from
     * @param Provider|value-of<Provider> $provider Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     * @param ProviderAuth|ProviderAuthShape $providerAuth
     * @param string $sourceRegion for intra-Telnyx buckets migration, specify the source bucket region in this field
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $bucketName,
        Provider|string $provider,
        ProviderAuth|array $providerAuth,
        ?string $sourceRegion = null,
        RequestOptions|array|null $requestOptions = null,
    ): MigrationSourceNewResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration source
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MigrationSourceGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): MigrationSourceListResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration source
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MigrationSourceDeleteResponse;
}
