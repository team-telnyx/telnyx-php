<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation\RegionType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type region_information = array{
 *   regionName?: string, regionType?: value-of<RegionType>
 * }
 */
final class RegionInformation implements BaseModel
{
    /** @use SdkModel<region_information> */
    use SdkModel;

    #[Api('region_name', optional: true)]
    public ?string $regionName;

    /** @var value-of<RegionType>|null $regionType */
    #[Api('region_type', enum: RegionType::class, optional: true)]
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
        $obj = new self;

        null !== $regionName && $obj->regionName = $regionName;
        null !== $regionType && $obj['regionType'] = $regionType;

        return $obj;
    }

    public function withRegionName(string $regionName): self
    {
        $obj = clone $this;
        $obj->regionName = $regionName;

        return $obj;
    }

    /**
     * @param RegionType|value-of<RegionType> $regionType
     */
    public function withRegionType(RegionType|string $regionType): self
    {
        $obj = clone $this;
        $obj['regionType'] = $regionType;

        return $obj;
    }
}
