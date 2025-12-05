<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegionInformationShape = array{
 *   region_name?: string|null, region_type?: string|null
 * }
 */
final class RegionInformation implements BaseModel
{
    /** @use SdkModel<RegionInformationShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $region_name;

    #[Api(optional: true)]
    public ?string $region_type;

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
        ?string $region_name = null,
        ?string $region_type = null
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

    public function withRegionType(string $regionType): self
    {
        $obj = clone $this;
        $obj['region_type'] = $regionType;

        return $obj;
    }
}
