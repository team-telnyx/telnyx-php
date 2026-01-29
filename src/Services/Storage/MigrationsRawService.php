<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationsRawContract;
use Telnyx\Storage\Migrations\MigrationCreateParams;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MigrationsRawService implements MigrationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Initiate a migration of data from an external provider into Telnyx Cloud Storage. Currently, only S3 is supported.
     *
     * @param array{
     *   sourceID: string,
     *   targetBucketName: string,
     *   targetRegion: string,
     *   refresh?: bool,
     * }|MigrationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MigrationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MigrationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id unique identifier for the data migration
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationGetResponse>
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'storage/migrations',
            options: $requestOptions,
            convert: MigrationListResponse::class,
        );
    }
}
