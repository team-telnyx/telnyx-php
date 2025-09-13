<?php

declare(strict_types=1);

namespace Telnyx\Networks\NetworkListInterfacesResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\NetworkListInterfacesResponse\Data\Region;

/**
 * @phpstan-type unnamed_type_with_intersection_parent16 = array{
 *   recordType?: string, region?: Region, regionCode?: string, type?: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent16> */
    use SdkModel;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api(optional: true)]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Api('region_code', optional: true)]
    public ?string $regionCode;

    /**
     * Identifies the type of the interface.
     */
    #[Api(optional: true)]
    public ?string $type;

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
        ?string $recordType = null,
        ?Region $region = null,
        ?string $regionCode = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $recordType && $obj->recordType = $recordType;
        null !== $region && $obj->region = $region;
        null !== $regionCode && $obj->regionCode = $regionCode;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withRegion(Region $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * Identifies the type of the interface.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
