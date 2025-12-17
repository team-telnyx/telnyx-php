<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderType;

/**
 * @phpstan-type MiscShape = array{
 *   type?: null|PortingOrderType|value-of<PortingOrderType>
 * }
 */
final class Misc implements BaseModel
{
    /** @use SdkModel<MiscShape> */
    use SdkModel;

    /**
     * Filter results by porting order type.
     *
     * @var value-of<PortingOrderType>|null $type
     */
    #[Optional(enum: PortingOrderType::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderType|value-of<PortingOrderType>|null $type
     */
    public static function with(PortingOrderType|string|null $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Filter results by porting order type.
     *
     * @param PortingOrderType|value-of<PortingOrderType> $type
     */
    public function withType(PortingOrderType|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
