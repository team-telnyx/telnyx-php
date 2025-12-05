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
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   porting_order_id?: string|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Created at date range filtering operations.
     */
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Filter by porting order ID.
     */
    #[Api(optional: true)]
    public ?string $porting_order_id;

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
     * @param CreatedAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $created_at
     * @param Type|value-of<Type> $type
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        ?string $porting_order_id = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Created at date range filtering operations.
     *
     * @param CreatedAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Filter by porting order ID.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['porting_order_id'] = $portingOrderID;

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
