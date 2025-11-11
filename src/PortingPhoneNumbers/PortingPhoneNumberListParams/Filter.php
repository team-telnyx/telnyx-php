<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter\PortingOrderStatus;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status].
 *
 * @phpstan-type FilterShape = array{
 *   porting_order_status?: value-of<PortingOrderStatus>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by porting order status.
     *
     * @var value-of<PortingOrderStatus>|null $porting_order_status
     */
    #[Api(enum: PortingOrderStatus::class, optional: true)]
    public ?string $porting_order_status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $porting_order_status
     */
    public static function with(
        PortingOrderStatus|string|null $porting_order_status = null
    ): self {
        $obj = new self;

        null !== $porting_order_status && $obj['porting_order_status'] = $porting_order_status;

        return $obj;
    }

    /**
     * Filter results by porting order status.
     *
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $portingOrderStatus
     */
    public function withPortingOrderStatus(
        PortingOrderStatus|string $portingOrderStatus
    ): self {
        $obj = clone $this;
        $obj['porting_order_status'] = $portingOrderStatus;

        return $obj;
    }
}
