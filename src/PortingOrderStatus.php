<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrdersExceptionType\Code;
use Telnyx\PortingOrderStatus\Value;

/**
 * Porting order status.
 *
 * @phpstan-type PortingOrderStatusShape = array{
 *   details?: list<PortingOrdersExceptionType>|null, value?: value-of<Value>|null
 * }
 */
final class PortingOrderStatus implements BaseModel
{
    /** @use SdkModel<PortingOrderStatusShape> */
    use SdkModel;

    /**
     * A list of 0 or more details about this porting order's status.
     *
     * @var list<PortingOrdersExceptionType>|null $details
     */
    #[Optional(list: PortingOrdersExceptionType::class)]
    public ?array $details;

    /**
     * The current status of the porting order.
     *
     * @var value-of<Value>|null $value
     */
    #[Optional(enum: Value::class)]
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
     * @param list<PortingOrdersExceptionType|array{
     *   code?: value-of<Code>|null, description?: string|null
     * }> $details
     * @param Value|value-of<Value> $value
     */
    public static function with(
        ?array $details = null,
        Value|string|null $value = null
    ): self {
        $self = new self;

        null !== $details && $self['details'] = $details;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * A list of 0 or more details about this porting order's status.
     *
     * @param list<PortingOrdersExceptionType|array{
     *   code?: value-of<Code>|null, description?: string|null
     * }> $details
     */
    public function withDetails(array $details): self
    {
        $self = clone $this;
        $self['details'] = $details;

        return $self;
    }

    /**
     * The current status of the porting order.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
