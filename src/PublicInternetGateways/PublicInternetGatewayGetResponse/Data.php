<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse\Data\Region;

/**
 * @phpstan-type unnamed_type_with_intersection_parent21 = array{
 *   publicIP?: string, recordType?: string, region?: Region, regionCode?: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent21> */
    use SdkModel;

    /**
     * The publically accessible ip for this interface.
     */
    #[Api('public_ip', optional: true)]
    public ?string $publicIP;

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
        ?string $publicIP = null,
        ?string $recordType = null,
        ?Region $region = null,
        ?string $regionCode = null,
    ): self {
        $obj = new self;

        null !== $publicIP && $obj->publicIP = $publicIP;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $region && $obj->region = $region;
        null !== $regionCode && $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * The publically accessible ip for this interface.
     */
    public function withPublicIP(string $publicIP): self
    {
        $obj = clone $this;
        $obj->publicIP = $publicIP;

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
}
