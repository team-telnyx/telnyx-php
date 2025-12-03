<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationsContract;
use Telnyx\Services\Storage\Migrations\ActionsService;
use Telnyx\Storage\Migrations\MigrationCreateParams;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

final class MigrationsService implements MigrationsContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Initiate a migration of data from an external provider into Telnyx Cloud Storage. Currently, only S3 is supported.
     *
     * @param array{
     *   source_id: string,
     *   target_bucket_name: string,
     *   target_region: string,
     *   refresh?: bool,
     * }|MigrationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MigrationCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): MigrationNewResponse {
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationGetResponse {
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
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): MigrationListResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'storage/migrations',
            options: $requestOptions,
            convert: MigrationListResponse::class,
        );
    }
}
