<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListParams\Filter\CreatedAt;
use Telnyx\Porting\Events\EventListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[porting_order_id], filter[created_at][gte], filter[created_at][lte].
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\Porting\Events\EventListParams\Filter\CreatedAt
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   portingOrderID?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Created at date range filtering operations.
     */
    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * Filter by porting order ID.
     */
    #[Optional('porting_order_id')]
    public ?string $portingOrderID;

    /**
     * Filter by event type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
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
     * @param CreatedAtShape $createdAt
     * @param Type|value-of<Type> $type
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        ?string $portingOrderID = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $portingOrderID && $self['portingOrderID'] = $portingOrderID;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Created at date range filtering operations.
     *
     * @param CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter by porting order ID.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    /**
     * Filter by event type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
