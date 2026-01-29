<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter\PortingOrderStatus;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status].
 *
 * @phpstan-type FilterShape = array{
 *   portingOrderStatus?: null|PortingOrderStatus|value-of<PortingOrderStatus>
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
    #[Optional('porting_order_status', enum: PortingOrderStatus::class)]
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
     * @param PortingOrderStatus|value-of<PortingOrderStatus>|null $portingOrderStatus
     */
    public static function with(
        PortingOrderStatus|string|null $portingOrderStatus = null
    ): self {
        $self = new self;

        null !== $portingOrderStatus && $self['portingOrderStatus'] = $portingOrderStatus;

        return $self;
    }

    /**
     * Filter results by porting order status.
     *
     * @param PortingOrderStatus|value-of<PortingOrderStatus> $portingOrderStatus
     */
    public function withPortingOrderStatus(
        PortingOrderStatus|string $portingOrderStatus
    ): self {
        $self = clone $this;
        $self['portingOrderStatus'] = $portingOrderStatus;

        return $self;
    }
}
