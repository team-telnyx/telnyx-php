<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventStatusChangedEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventWithoutWebhook;

/**
 * @phpstan-import-type DataShape from \Telnyx\Porting\Events\EventGetResponse\Data
 *
 * @phpstan-type EventGetResponseShape = array{data?: DataShape|null}
 */
final class EventGetResponse implements BaseModel
{
    /** @use SdkModel<EventGetResponseShape> */
    use SdkModel;

    #[Optional(union: Data::class)]
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
     * @param DataShape|null $data
     */
    public static function with(
        PortingEventDeletedPayload|array|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook|null $data = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(
        PortingEventDeletedPayload|array|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook $data,
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
