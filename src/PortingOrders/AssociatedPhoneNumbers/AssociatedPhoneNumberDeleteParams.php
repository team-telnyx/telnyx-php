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
 * @see Telnyx\STAINLESS_FIXME_PortingOrders\AssociatedPhoneNumbersService::delete()
 *
 * @phpstan-type AssociatedPhoneNumberDeleteParamsShape = array{
 *   porting_order_id: string
 * }
 */
final class AssociatedPhoneNumberDeleteParams implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $porting_order_id;

    /**
     * `new AssociatedPhoneNumberDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociatedPhoneNumberDeleteParams::with(porting_order_id: ...)
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
    public static function with(string $porting_order_id): self
    {
        $obj = new self;

        $obj->porting_order_id = $porting_order_id;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->porting_order_id = $portingOrderID;

        return $obj;
    }
}
