<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NetworkInterfaceRegionShape = array{regionCode?: string|null}
 */
final class NetworkInterfaceRegion implements BaseModel
{
    /** @use SdkModel<NetworkInterfaceRegionShape> */
    use SdkModel;

    /**
     * The region the interface should be deployed to.
     */
    #[Optional('region_code')]
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
        $self = new self;

        null !== $regionCode && $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The region the interface should be deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
