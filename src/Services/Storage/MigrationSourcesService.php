<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\MigrationSourcesContract;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

final class MigrationSourcesService implements MigrationSourcesContract
{
    /**
     * @api
     */
    public MigrationSourcesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MigrationSourcesRawService($client);
    }

    /**
     * @api
     *
     * Create a source from which data can be migrated from.
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
    ): MigrationSourceNewResponse {
        $params = [
            'bucketName' => $bucketName,
            'provider' => $provider,
            'providerAuth' => $providerAuth,
            'sourceRegion' => $sourceRegion,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a Migration Source
     *
     * @param string $id unique identifier for the data migration source
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Migration Source
     *
     * @param string $id unique identifier for the data migration source
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MigrationSourceDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
