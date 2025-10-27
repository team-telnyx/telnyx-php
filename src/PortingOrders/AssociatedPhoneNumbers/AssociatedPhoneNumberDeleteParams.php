<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes an associated phone number from a porting order.
 *
 * @see Telnyx\PortingOrders\AssociatedPhoneNumbers->delete
 *
 * @phpstan-type associated_phone_number_delete_params = array{
 *   portingOrderID: string
 * }
 */
final class AssociatedPhoneNumberDeleteParams implements BaseModel
{
    /** @use SdkModel<associated_phone_number_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $portingOrderID;

    /**
     * `new AssociatedPhoneNumberDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociatedPhoneNumberDeleteParams::with(portingOrderID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociatedPhoneNumberDeleteParams)->withPortingOrderID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $portingOrderID): self
    {
        $obj = new self;

        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }
}
