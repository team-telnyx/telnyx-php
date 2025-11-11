<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationSourcesContract;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

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
     * @param array{
     *   bucket_name: string,
     *   provider: "aws"|"telnyx",
     *   provider_auth: array{access_key?: string, secret_access_key?: string},
     *   source_region?: string,
     * }|MigrationSourceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MigrationSourceCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MigrationSourceNewResponse {
        [$parsed, $options] = MigrationSourceCreateParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @throws APIException
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
     * @throws APIException
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
