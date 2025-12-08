<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation\RegionType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegionInformationShape = array{
 *   region_name?: string|null, region_type?: value-of<RegionType>|null
 * }
 */
final class RegionInformation implements BaseModel
{
    /** @use SdkModel<RegionInformationShape> */
    use SdkModel;

    #[Optional]
    public ?string $region_name;

    /** @var value-of<RegionType>|null $region_type */
    #[Optional(enum: RegionType::class)]
    public ?string $region_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RegionType|value-of<RegionType> $region_type
     */
    public static function with(
        ?string $region_name = null,
        RegionType|string|null $region_type = null
    ): self {
        $obj = new self;

        null !== $region_name && $obj['region_name'] = $region_name;
        null !== $region_type && $obj['region_type'] = $region_type;

        return $obj;
    }

    public function withRegionName(string $regionName): self
    {
        $obj = clone $this;
        $obj['region_name'] = $regionName;

        return $obj;
    }

    /**
     * @param RegionType|value-of<RegionType> $regionType
     */
    public function withRegionType(RegionType|string $regionType): self
    {
        $obj = clone $this;
        $obj['region_type'] = $regionType;

        return $obj;
    }
}
