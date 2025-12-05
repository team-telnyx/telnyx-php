<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a phone number block.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberBlocksService::delete()
 *
 * @phpstan-type PhoneNumberBlockDeleteParamsShape = array{
 *   porting_order_id: string
 * }
 */
final class PhoneNumberBlockDeleteParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberBlockDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $porting_order_id;

    /**
     * `new PhoneNumberBlockDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberBlockDeleteParams::with(porting_order_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberBlockDeleteParams)->withPortingOrderID(...)
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
