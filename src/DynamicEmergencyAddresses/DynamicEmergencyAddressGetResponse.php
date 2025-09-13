<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type dynamic_emergency_address_get_response = array{
 *   data?: DynamicEmergencyAddress
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class DynamicEmergencyAddressGetResponse implements BaseModel
{
    /** @use SdkModel<dynamic_emergency_address_get_response> */
    use SdkModel;

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
