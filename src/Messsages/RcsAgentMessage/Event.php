<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\Event\EventType;

/**
 * RCS Event to send to the recipient.
 *
 * @phpstan-type EventShape = array{event_type?: value-of<EventType>|null}
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    /** @var value-of<EventType>|null $event_type */
    #[Api(enum: EventType::class, optional: true)]
    public ?string $event_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EventType|value-of<EventType> $event_type
     */
    public static function with(EventType|string|null $event_type = null): self
    {
        $obj = new self;

        null !== $event_type && $obj['event_type'] = $event_type;

        return $obj;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['event_type'] = $eventType;

        return $obj;
    }
}
