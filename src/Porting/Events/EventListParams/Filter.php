<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListParams\Filter\CreatedAt;
use Telnyx\Porting\Events\EventListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[porting_order_id], filter[created_at][gte], filter[created_at][lte].
 *
 * @phpstan-type filter_alias = array{
 *   createdAt?: CreatedAt, portingOrderID?: string, type?: value-of<Type>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Created at date range filtering operations.
     */
    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * Filter by porting order ID.
     */
    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * Filter by event type.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?CreatedAt $createdAt = null,
        ?string $portingOrderID = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Created at date range filtering operations.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter by porting order ID.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

        return $obj;
    }

    /**
     * Filter by event type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
