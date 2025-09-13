<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type associated_phone_number_new_response = array{
 *   data?: PortingAssociatedPhoneNumber
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AssociatedPhoneNumberNewResponse implements BaseModel
{
    /** @use SdkModel<associated_phone_number_new_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PortingAssociatedPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortingAssociatedPhoneNumber $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortingAssociatedPhoneNumber $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
