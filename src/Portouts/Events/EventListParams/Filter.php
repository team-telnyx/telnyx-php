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
 *   createdAt?: CreatedAt|null,
 *   eventType?: value-of<EventType>|null,
 *   portoutID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by created_at date range using nested operations.
     */
    #[Optional('created_at')]
    public ?CreatedAt $createdAt;

    /**
     * Filter by event type.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    /**
     * Filter by port-out order ID.
     */
    #[Optional('portout_id')]
    public ?string $portoutID;

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
     * } $createdAt
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        EventType|string|null $eventType = null,
        ?string $portoutID = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $portoutID && $self['portoutID'] = $portoutID;

        return $self;
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
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter by event type.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * Filter by port-out order ID.
     */
    public function withPortoutID(string $portoutID): self
    {
        $self = clone $this;
        $self['portoutID'] = $portoutID;

        return $self;
    }
}
