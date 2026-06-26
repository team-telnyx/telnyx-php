<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VirtualCrossConnects\RegionOut\Region;

/**
 * @phpstan-import-type RegionShape from \Telnyx\VirtualCrossConnects\RegionOut\Region
 *
 * @phpstan-type RegionOutShape = array{
 *   region?: null|Region|RegionShape, regionCode?: string|null
 * }
 */
final class RegionOut implements BaseModel
{
    /** @use SdkModel<RegionOutShape> */
    use SdkModel;

    #[Optional]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Region|RegionShape|null $region
     */
    public static function with(
        Region|array|null $region = null,
        ?string $regionCode = null
    ): self {
        $self = new self;

        null !== $region && $self['region'] = $region;
        null !== $regionCode && $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * @param Region|RegionShape $region
     */
    public function withRegion(Region|array $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
