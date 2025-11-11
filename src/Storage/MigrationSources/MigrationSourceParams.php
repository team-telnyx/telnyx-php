<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceParams\ProviderAuth;

/**
 * @phpstan-type MigrationSourceParamsShape = array{
 *   bucket_name: string,
 *   provider: value-of<Provider>,
 *   provider_auth: ProviderAuth,
 *   id?: string|null,
 *   source_region?: string|null,
 * }
 */
final class MigrationSourceParams implements BaseModel
{
    /** @use SdkModel<MigrationSourceParamsShape> */
    use SdkModel;

    /**
     * Bucket name to migrate the data from.
     */
    #[Api]
    public string $bucket_name;

    /**
     * Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     *
     * @var value-of<Provider> $provider
     */
    #[Api(enum: Provider::class)]
    public string $provider;

    #[Api]
    public ProviderAuth $provider_auth;

    /**
     * Unique identifier for the data migration source.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    #[Api(optional: true)]
    public ?string $source_region;

    /**
     * `new MigrationSourceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MigrationSourceParams::with(bucket_name: ..., provider: ..., provider_auth: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MigrationSourceParams)
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
        string $bucket_name,
        Provider|string $provider,
        ProviderAuth $provider_auth,
        ?string $id = null,
        ?string $source_region = null,
    ): self {
        $obj = new self;

        $obj->bucket_name = $bucket_name;
        $obj['provider'] = $provider;
        $obj->provider_auth = $provider_auth;

        null !== $id && $obj->id = $id;
        null !== $source_region && $obj->source_region = $source_region;

        return $obj;
    }

    /**
     * Bucket name to migrate the data from.
     */
    public function withBucketName(string $bucketName): self
    {
        $obj = clone $this;
        $obj->bucket_name = $bucketName;

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
        $obj['provider'] = $provider;

        return $obj;
    }

    public function withProviderAuth(ProviderAuth $providerAuth): self
    {
        $obj = clone $this;
        $obj->provider_auth = $providerAuth;

        return $obj;
    }

    /**
     * Unique identifier for the data migration source.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    public function withSourceRegion(string $sourceRegion): self
    {
        $obj = clone $this;
        $obj->source_region = $sourceRegion;

        return $obj;
    }
}
