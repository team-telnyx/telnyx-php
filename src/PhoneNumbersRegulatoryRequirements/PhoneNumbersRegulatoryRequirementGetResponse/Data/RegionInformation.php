<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegionInformationShape = array{
 *   regionName?: string|null, regionType?: string|null
 * }
 */
final class RegionInformation implements BaseModel
{
    /** @use SdkModel<RegionInformationShape> */
    use SdkModel;

    #[Optional('region_name')]
    public ?string $regionName;

    #[Optional('region_type')]
    public ?string $regionType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $regionName = null,
        ?string $regionType = null
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

    public function withRegionType(string $regionType): self
    {
        $self = clone $this;
        $self['regionType'] = $regionType;

        return $self;
    }
}
