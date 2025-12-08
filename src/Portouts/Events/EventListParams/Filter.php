<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListParams\Filter\CreatedAt;
use Telnyx\Portouts\Events\EventListParams\Filter\EventType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   event_type?: value-of<EventType>|null,
 *   portout_id?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by created_at date range using nested operations.
     */
    #[Optional]
    public ?CreatedAt $created_at;

    /**
     * Filter by event type.
     *
     * @var value-of<EventType>|null $event_type
     */
    #[Optional(enum: EventType::class)]
    public ?string $event_type;

    /**
     * Filter by port-out order ID.
     */
    #[Optional]
    public ?string $portout_id;

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
     * @param EventType|value-of<EventType> $event_type
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        EventType|string|null $event_type = null,
        ?string $portout_id = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $event_type && $obj['event_type'] = $event_type;
        null !== $portout_id && $obj['portout_id'] = $portout_id;

        return $obj;
    }

    /**
     * Filter by created_at date range using nested operations.
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
     * Filter by event type.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['event_type'] = $eventType;

        return $obj;
    }

    /**
     * Filter by port-out order ID.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj['portout_id'] = $portoutID;

        return $obj;
    }
}
