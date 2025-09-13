<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrderStatus\Value;

/**
 * Porting order status.
 *
 * @phpstan-type porting_order_status = array{
 *   details?: list<PortingOrdersExceptionType>, value?: value-of<Value>
 * }
 */
final class PortingOrderStatus implements BaseModel
{
    /** @use SdkModel<porting_order_status> */
    use SdkModel;

    /**
     * A list of 0 or more details about this porting order's status.
     *
     * @var list<PortingOrdersExceptionType>|null $details
     */
    #[Api(list: PortingOrdersExceptionType::class, optional: true)]
    public ?array $details;

    /**
     * The current status of the porting order.
     *
     * @var value-of<Value>|null $value
     */
    #[Api(enum: Value::class, optional: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PortingOrdersExceptionType> $details
     * @param Value|value-of<Value> $value
     */
    public static function with(
        ?array $details = null,
        Value|string|null $value = null
    ): self {
        $obj = new self;

        null !== $details && $obj->details = $details;
        null !== $value && $obj->value = $value instanceof Value ? $value->value : $value;

        return $obj;
    }

    /**
     * A list of 0 or more details about this porting order's status.
     *
     * @param list<PortingOrdersExceptionType> $details
     */
    public function withDetails(array $details): self
    {
        $obj = clone $this;
        $obj->details = $details;

        return $obj;
    }

    /**
     * The current status of the porting order.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $obj = clone $this;
        $obj->value = $value instanceof Value ? $value->value : $value;

        return $obj;
    }
}
