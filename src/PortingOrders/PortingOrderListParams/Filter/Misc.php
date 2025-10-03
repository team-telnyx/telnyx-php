<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderType;

/**
 * @phpstan-type misc_alias = array{type?: value-of<PortingOrderType>}
 */
final class Misc implements BaseModel
{
    /** @use SdkModel<misc_alias> */
    use SdkModel;

    /**
     * Filter results by porting order type.
     *
     * @var value-of<PortingOrderType>|null $type
     */
    #[Api(enum: PortingOrderType::class, optional: true)]
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
     * @param PortingOrderType|value-of<PortingOrderType> $type
     */
    public static function with(PortingOrderType|string|null $type = null): self
    {
        $obj = new self;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Filter results by porting order type.
     *
     * @param PortingOrderType|value-of<PortingOrderType> $type
     */
    public function withType(PortingOrderType|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
