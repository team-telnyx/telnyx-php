<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type region_information = array{
 *   regionName?: string, regionType?: string
 * }
 */
final class RegionInformation implements BaseModel
{
    /** @use SdkModel<region_information> */
    use SdkModel;

    #[Api('region_name', optional: true)]
    public ?string $regionName;

    #[Api('region_type', optional: true)]
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
        $obj = new self;

        null !== $regionName && $obj->regionName = $regionName;
        null !== $regionType && $obj->regionType = $regionType;

        return $obj;
    }

    public function withRegionName(string $regionName): self
    {
        $obj = clone $this;
        $obj->regionName = $regionName;

        return $obj;
    }

    public function withRegionType(string $regionType): self
    {
        $obj = clone $this;
        $obj->regionType = $regionType;

        return $obj;
    }
}
