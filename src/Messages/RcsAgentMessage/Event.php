<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsAgentMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsAgentMessage\Event\EventType;

/**
 * RCS Event to send to the recipient.
 *
 * @phpstan-type EventShape = array{eventType?: null|EventType|value-of<EventType>}
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    /** @var value-of<EventType>|null $eventType */
    #[Optional('event_type', enum: EventType::class)]
    public ?string $eventType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EventType|value-of<EventType>|null $eventType
     */
    public static function with(EventType|string|null $eventType = null): self
    {
        $self = new self;

        null !== $eventType && $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }
}
