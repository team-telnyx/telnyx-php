<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation\RegionType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegionInformationShape = array{
 *   regionName?: string|null, regionType?: value-of<RegionType>|null
 * }
 */
final class RegionInformation implements BaseModel
{
    /** @use SdkModel<RegionInformationShape> */
    use SdkModel;

    #[Optional('region_name')]
    public ?string $regionName;

    /** @var value-of<RegionType>|null $regionType */
    #[Optional('region_type', enum: RegionType::class)]
    public ?string $regionType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RegionType|value-of<RegionType> $regionType
     */
    public static function with(
        ?string $regionName = null,
        RegionType|string|null $regionType = null
    ): self {
        $self = new self;

        null !== $regionName && $self['regionName'] = $regionName;
        null !== $regionType && $self['regionType'] = $regionType;

        return $self;
    }

    public function withRegionName(string $regionName): self
    {
        $self = clone $this;
        $self['regionName'] = $regionName;

        return $self;
    }

    /**
     * @param RegionType|value-of<RegionType> $regionType
     */
    public function withRegionType(RegionType|string $regionType): self
    {
        $self = clone $this;
        $self['regionType'] = $regionType;

        return $self;
    }
}
