<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingEventVariants from \Telnyx\Porting\Events\PortingEvent
 * @phpstan-import-type PortingEventShape from \Telnyx\Porting\Events\PortingEvent
 *
 * @phpstan-type EventGetResponseShape = array{data?: PortingEventShape|null}
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    /** @var PortingEventVariants|null $data */
    #[Optional(union: PortingEvent::class)]
    public PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook|null $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingEventShape|null $data
     */
    public static function with(
        PortingEventDeletedPayload|array|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook|null $data = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingEventShape $data
     */
    public function withData(
        PortingEventDeletedPayload|array|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook $data,
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
