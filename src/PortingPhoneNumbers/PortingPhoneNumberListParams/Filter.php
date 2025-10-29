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
 *   portingOrderStatus?: value-of<PortingOrderStatus>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by porting order status.
     *
     * @var value-of<PortingOrderStatus>|null $portingOrderStatus
     */
    #[Api(
        'porting_order_status',
        enum: PortingOrderStatus::class,
        optional: true
    )]
    public ?string $portingOrderStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $portingOrderStatus
     */
    public static function with(
        PortingOrderStatus|string|null $portingOrderStatus = null
    ): self {
        $obj = new self;

        null !== $portingOrderStatus && $obj['portingOrderStatus'] = $portingOrderStatus;

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
        $obj['portingOrderStatus'] = $portingOrderStatus;

        return $obj;
    }
}
