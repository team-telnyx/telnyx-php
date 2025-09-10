<?php

declare(strict_types=1);

namespace Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data\Provider;

/**
 * @phpstan-type data_alias = array{
 *   provider?: value-of<Provider>|null, sourceRegion?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Cloud provider from which to migrate data.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Api(enum: Provider::class, optional: true)]
    public ?string $provider;

    /**
     * Provider region from which to migrate data.
     */
    #[Api('source_region', optional: true)]
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
        $obj = new self;

        null !== $provider && $obj->provider = $provider instanceof Provider ? $provider->value : $provider;
        null !== $sourceRegion && $obj->sourceRegion = $sourceRegion;

        return $obj;
    }

    /**
     * Cloud provider from which to migrate data.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $obj = clone $this;
        $obj->provider = $provider instanceof Provider ? $provider->value : $provider;

        return $obj;
    }

    /**
     * Provider region from which to migrate data.
     */
    public function withSourceRegion(string $sourceRegion): self
    {
        $obj = clone $this;
        $obj->sourceRegion = $sourceRegion;

        return $obj;
    }
}
