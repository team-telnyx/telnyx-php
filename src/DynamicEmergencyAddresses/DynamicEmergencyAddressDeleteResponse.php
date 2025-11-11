<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type DynamicEmergencyAddressDeleteResponseShape = array{
 *   data?: DynamicEmergencyAddress|null
 * }
 */
final class DynamicEmergencyAddressDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DynamicEmergencyAddressDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?DynamicEmergencyAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?DynamicEmergencyAddress $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(DynamicEmergencyAddress $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
