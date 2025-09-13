<?php

declare(strict_types=1);

namespace Telnyx\Addresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type address_new_response = array{data?: Address}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AddressNewResponse implements BaseModel
{
    /** @use SdkModel<address_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Address $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Address $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Address $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
