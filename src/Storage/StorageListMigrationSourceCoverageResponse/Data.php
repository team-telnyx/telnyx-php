<?php

declare(strict_types=1);

namespace Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data\Provider;

/**
 * @phpstan-type DataShape = array{
 *   provider?: value-of<Provider>|null, sourceRegion?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Cloud provider from which to migrate data.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * Provider region from which to migrate data.
     */
    #[Optional('source_region')]
    public ?string $sourceRegion;

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
        Provider|string|null $provider = null,
        ?string $sourceRegion = null
    ): self {
        $self = new self;

        null !== $provider && $self['provider'] = $provider;
        null !== $sourceRegion && $self['sourceRegion'] = $sourceRegion;

        return $self;
    }

    /**
     * Cloud provider from which to migrate data.
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
     * Provider region from which to migrate data.
     */
    public function withSourceRegion(string $sourceRegion): self
    {
        $self = clone $this;
        $self['sourceRegion'] = $sourceRegion;

        return $self;
    }
}
