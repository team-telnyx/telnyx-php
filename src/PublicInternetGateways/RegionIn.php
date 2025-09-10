<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type region_in = array{regionCode?: string|null}
 */
final class RegionIn implements BaseModel
{
    /** @use SdkModel<region_in> */
    use SdkModel;

    /**
     * The region the interface should be deployed to.
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
    public static function with(?string $regionCode = null): self
    {
        $obj = new self;

        null !== $regionCode && $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
