<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MigrationSourceCreateParams); // set properties as needed
 * $client->storage.migrationSources->create(...$params->toArray());
 * ```
 * Create a source from which data can be migrated from.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->storage.migrationSources->create(...$params->toArray());`
 *
 * @see Telnyx\Storage\MigrationSources->create
 *
 * @phpstan-type migration_source_create_params = array{
 *   bucketName: string,
 *   provider: Provider|value-of<Provider>,
 *   providerAuth: ProviderAuth,
 *   sourceRegion?: string,
 * }
 */
final class MigrationSourceCreateParams implements BaseModel
{
    /** @use SdkModel<migration_source_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Bucket name to migrate the data from.
     */
    #[Api('bucket_name')]
    public string $bucketName;

    /**
     * Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     *
     * @var value-of<Provider> $provider
     */
    #[Api(enum: Provider::class)]
    public string $provider;

    #[Api('provider_auth')]
    public ProviderAuth $providerAuth;

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    #[Api('source_region', optional: true)]
    public ?string $sourceRegion;

    /**
     * `new MigrationSourceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MigrationSourceCreateParams::with(
     *   bucketName: ..., provider: ..., providerAuth: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MigrationSourceCreateParams)
     *   ->withBucketName(...)
     *   ->withProvider(...)
     *   ->withProviderAuth(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public static function with(
        string $bucketName,
        Provider|string $provider,
        ProviderAuth $providerAuth,
        ?string $sourceRegion = null,
    ): self {
        $obj = new self;

        $obj->bucketName = $bucketName;
        $obj->provider = $provider instanceof Provider ? $provider->value : $provider;
        $obj->providerAuth = $providerAuth;

        null !== $sourceRegion && $obj->sourceRegion = $sourceRegion;

        return $obj;
    }

    /**
     * Bucket name to migrate the data from.
     */
    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucketName = $bucketName;

        return $obj;
    }

    /**
     * Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $obj = clone $this;
        $obj->provider = $provider instanceof Provider ? $provider->value : $provider;

        return $obj;
    }

    public function withProviderAuth(ProviderAuth $providerAuth): self
    {
        $obj = clone $this;
        $obj->providerAuth = $providerAuth;

        return $obj;
    }

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    public function withSourceRegion(string $sourceRegion): self
    {
        $obj = clone $this;
        $obj->sourceRegion = $sourceRegion;

        return $obj;
    }
}
