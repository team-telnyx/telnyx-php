<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort\Value;

/**
 * Consolidated sort parameter (deepObject style). Originally: sort[value].
 *
 * @phpstan-type SortShape = array{value?: null|Value|value-of<Value>}
 */
final class Sort implements BaseModel
{
    /** @use SdkModel<SortShape> */
    use SdkModel;

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
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
     * @param Value|value-of<Value>|null $value
     */
    public static function with(Value|string|null $value = null): self
    {
        $self = new self;

        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
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
