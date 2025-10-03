<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListParams\Filter\CreatedAt;
use Telnyx\Portouts\Events\EventListParams\Filter\EventType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[event_type], filter[portout_id], filter[created_at].
 *
 * @phpstan-type filter_alias = array{
 *   createdAt?: CreatedAt, eventType?: value-of<EventType>, portoutID?: string
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by created_at date range using nested operations.
     */
    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    /**
     * Filter by event type.
     *
     * @var value-of<EventType>|null $eventType
     */
    #[Api('event_type', enum: EventType::class, optional: true)]
    public ?string $eventType;

    /**
     * Filter by port-out order ID.
     */
    #[Api('portout_id', optional: true)]
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
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(
        ?CreatedAt $createdAt = null,
        EventType|string|null $eventType = null,
        ?string $portoutID = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $portoutID && $obj->portoutID = $portoutID;

        return $obj;
    }

    /**
     * Filter by created_at date range using nested operations.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * Filter by port-out order ID.
     */
    public function withPortoutID(string $portoutID): self
    {
        $obj = clone $this;
        $obj->portoutID = $portoutID;

        return $obj;
    }
}
