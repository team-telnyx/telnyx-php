<?php

declare(strict_types=1);

namespace Telnyx\UserAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type user_address_new_response = array{data?: UserAddress}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class UserAddressNewResponse implements BaseModel
{
    /** @use SdkModel<user_address_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?UserAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?UserAddress $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(UserAddress $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
