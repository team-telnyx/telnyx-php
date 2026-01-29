<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\Provider;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;

/**
 * Create a source from which data can be migrated from.
 *
 * @see Telnyx\Services\Storage\MigrationSourcesService::create()
 *
 * @phpstan-import-type ProviderAuthShape from \Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth
 *
 * @phpstan-type MigrationSourceCreateParamsShape = array{
 *   bucketName: string,
 *   provider: Provider|value-of<Provider>,
 *   providerAuth: ProviderAuth|ProviderAuthShape,
 *   sourceRegion?: string|null,
 * }
 */
final class MigrationSourceCreateParams implements BaseModel
{
    /** @use SdkModel<MigrationSourceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Bucket name to migrate the data from.
     */
    #[Required('bucket_name')]
    public string $bucketName;

    /**
     * Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     *
     * @var value-of<Provider> $provider
     */
    #[Required(enum: Provider::class)]
    public string $provider;

    #[Required('provider_auth')]
    public ProviderAuth $providerAuth;

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    #[Optional('source_region')]
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
     * @param ProviderAuth|ProviderAuthShape $providerAuth
     */
    public static function with(
        string $bucketName,
        Provider|string $provider,
        ProviderAuth|array $providerAuth,
        ?string $sourceRegion = null,
    ): self {
        $self = new self;

        $self['bucketName'] = $bucketName;
        $self['provider'] = $provider;
        $self['providerAuth'] = $providerAuth;

        null !== $sourceRegion && $self['sourceRegion'] = $sourceRegion;

        return $self;
    }

    /**
     * Bucket name to migrate the data from.
     */
    public function withBucketName(string $bucketName): self
    {
        $self = clone $this;
        $self['bucketName'] = $bucketName;

        return $self;
    }

    /**
     * Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * @param ProviderAuth|ProviderAuthShape $providerAuth
     */
    public function withProviderAuth(ProviderAuth|array $providerAuth): self
    {
        $self = clone $this;
        $self['providerAuth'] = $providerAuth;

        return $self;
    }

    /**
     * For intra-Telnyx buckets migration, specify the source bucket region in this field.
     */
    public function withSourceRegion(string $sourceRegion): self
    {
        $self = clone $this;
        $self['sourceRegion'] = $sourceRegion;

        return $self;
    }
}
