<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationSourcesContract;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

use const Telnyx\Core\OMIT as omit;

final class MigrationSourcesService implements MigrationSourcesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a source from which data can be migrated from.
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
    ): MigrationSourceNewResponse {
        [$parsed, $options] = MigrationSourceCreateParams::parseRequest(
            [
                'bucketName' => $bucketName,
                'provider' => $provider,
                'providerAuth' => $providerAuth,
                'sourceRegion' => $sourceRegion,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'storage/migration_sources',
            body: (object) $parsed,
            options: $options,
            convert: MigrationSourceNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a Migration Source
     *
     * @return MigrationSourceGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['storage/migration_sources/%1$s', $id],
            options: $requestOptions,
            convert: MigrationSourceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Migration Sources
     *
     * @return MigrationSourceListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationSourceListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'storage/migration_sources',
            options: $requestOptions,
            convert: MigrationSourceListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Migration Source
     *
     * @return MigrationSourceDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['storage/migration_sources/%1$s', $id],
            options: $requestOptions,
            convert: MigrationSourceDeleteResponse::class,
        );
    }
}
