<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DynamicEmergencyAddressShape from \Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress
 *
 * @phpstan-type DynamicEmergencyAddressDeleteResponseShape = array{
 *   data?: null|DynamicEmergencyAddress|DynamicEmergencyAddressShape
 * }
 */
final class DynamicEmergencyAddressDeleteResponse implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyAddressDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?DynamicEmergencyAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DynamicEmergencyAddress|DynamicEmergencyAddressShape|null $data
     */
    public static function with(
        DynamicEmergencyAddress|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DynamicEmergencyAddress|DynamicEmergencyAddressShape $data
     */
    public function withData(DynamicEmergencyAddress|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
