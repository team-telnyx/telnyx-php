<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort\Value;

/**
 * Consolidated sort parameter (deepObject style). Originally: sort[value].
 *
 * @phpstan-type sort_alias = array{value?: value-of<Value>|null}
 */
final class Sort implements BaseModel
{
    /** @use SdkModel<sort_alias> */
    use SdkModel;

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
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
     * @param Value|value-of<Value> $value
     */
    public static function with(Value|string|null $value = null): self
    {
        $obj = new self;

        null !== $value && $obj->value = $value instanceof Value ? $value->value : $value;

        return $obj;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
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
