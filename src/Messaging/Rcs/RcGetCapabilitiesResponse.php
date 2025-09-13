<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type rc_get_capabilities_response = array{data?: RcsCapabilities}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class RcGetCapabilitiesResponse implements BaseModel
{
    /** @use SdkModel<rc_get_capabilities_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?RcsCapabilities $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?RcsCapabilities $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(RcsCapabilities $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
