<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationSourcesRawContract;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

/**
 * Migrate data from an external provider into Telnyx Cloud Storage.
 *
 * @phpstan-import-type ProviderAuthShape from \Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MigrationSourcesRawService implements MigrationSourcesRawContract
{
    // @phpstan-ignore-next-line
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
     *   bucketName: string,
     *   provider: Provider|value-of<Provider>,
     *   providerAuth: ProviderAuth|ProviderAuthShape,
     *   sourceRegion?: string,
     * }|MigrationSourceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MigrationSourceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MigrationSourceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id unique identifier for the data migration source
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id unique identifier for the data migration source
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['storage/migration_sources/%1$s', $id],
            options: $requestOptions,
            convert: MigrationSourceDeleteResponse::class,
        );
    }
}
