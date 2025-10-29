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
 *   bucketName: string,
 *   provider: value-of<Provider>,
 *   providerAuth: ProviderAuth,
 *   id?: string,
 *   sourceRegion?: string,
 * }
 */
final class MigrationSourceParams implements BaseModel
{
    /** @use SdkModel<MigrationSourceParamsShape> */
    use SdkModel;

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
     * Unique identifier for the data migration source.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    #[Api('source_region', optional: true)]
    public ?string $sourceRegion;

    /**
     * `new MigrationSourceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MigrationSourceParams::with(bucketName: ..., provider: ..., providerAuth: ...)
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
        string $bucketName,
        Provider|string $provider,
        ProviderAuth $providerAuth,
        ?string $id = null,
        ?string $sourceRegion = null,
    ): self {
        $obj = new self;

        $obj->bucketName = $bucketName;
        $obj['provider'] = $provider;
        $obj->providerAuth = $providerAuth;

        null !== $id && $obj->id = $id;
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
        $obj['provider'] = $provider;

        return $obj;
    }

    public function withProviderAuth(ProviderAuth $providerAuth): self
    {
        $obj = clone $this;
        $obj->providerAuth = $providerAuth;

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
        $obj->sourceRegion = $sourceRegion;

        return $obj;
    }
}
