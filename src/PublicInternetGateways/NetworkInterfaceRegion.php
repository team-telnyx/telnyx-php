<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NetworkInterfaceRegionShape = array{region_code?: string|null}
 */
final class NetworkInterfaceRegion implements BaseModel
{
    /** @use SdkModel<NetworkInterfaceRegionShape> */
    use SdkModel;

    /**
     * The region the interface should be deployed to.
     */
    #[Api(optional: true)]
    public ?string $region_code;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $region_code = null): self
    {
        $obj = new self;

        null !== $region_code && $obj->region_code = $region_code;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->region_code = $regionCode;

        return $obj;
    }
}
