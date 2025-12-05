<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a phone number extension.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberExtensionsService::delete()
 *
 * @phpstan-type PhoneNumberExtensionDeleteParamsShape = array{
 *   porting_order_id: string
 * }
 */
final class PhoneNumberExtensionDeleteParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $porting_order_id;

    /**
     * `new PhoneNumberExtensionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberExtensionDeleteParams::with(porting_order_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberExtensionDeleteParams)->withPortingOrderID(...)
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

        $obj['porting_order_id'] = $porting_order_id;

        return $obj;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['porting_order_id'] = $portingOrderID;

        return $obj;
    }
}
