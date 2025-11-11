<?php

declare(strict_types=1);

namespace Telnyx\Storage\StorageListMigrationSourceCoverageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data\Provider;

/**
 * @phpstan-type DataShape = array{
 *   provider?: value-of<Provider>|null, source_region?: string|null
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
    #[Api(enum: Provider::class, optional: true)]
    public ?string $provider;

    /**
     * Provider region from which to migrate data.
     */
    #[Api(optional: true)]
    public ?string $source_region;

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
        ?string $source_region = null
    ): self {
        $obj = new self;

        null !== $provider && $obj['provider'] = $provider;
        null !== $source_region && $obj->source_region = $source_region;

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
        $obj['provider'] = $provider;

        return $obj;
    }

    /**
     * Provider region from which to migrate data.
     */
    public function withSourceRegion(string $sourceRegion): self
    {
        $obj = clone $this;
        $obj->source_region = $sourceRegion;

        return $obj;
    }
}
