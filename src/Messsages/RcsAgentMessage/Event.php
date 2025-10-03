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
 * @phpstan-type event_alias = array{eventType?: value-of<EventType>}
 */
final class Event implements BaseModel
{
    /** @use SdkModel<event_alias> */
    use SdkModel;

    /** @var value-of<EventType>|null $eventType */
    #[Api('event_type', enum: EventType::class, optional: true)]
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
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(EventType|string|null $eventType = null): self
    {
        $obj = new self;

        null !== $eventType && $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }
}
