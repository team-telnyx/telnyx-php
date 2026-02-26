<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type PortingEventDeletedPayloadShape from \Telnyx\Porting\Events\PortingEventDeletedPayload
 * @phpstan-import-type PortingEventMessagingChangedPayloadShape from \Telnyx\Porting\Events\PortingEventMessagingChangedPayload
 * @phpstan-import-type PortingEventStatusChangedEventShape from \Telnyx\Porting\Events\PortingEventStatusChangedEvent
 * @phpstan-import-type PortingEventNewCommentEventShape from \Telnyx\Porting\Events\PortingEventNewCommentEvent
 * @phpstan-import-type PortingEventSplitEventShape from \Telnyx\Porting\Events\PortingEventSplitEvent
 * @phpstan-import-type PortingEventWithoutWebhookShape from \Telnyx\Porting\Events\PortingEventWithoutWebhook
 *
 * @phpstan-type EventListResponseVariants = PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook
 * @phpstan-type EventListResponseShape = EventListResponseVariants|PortingEventDeletedPayloadShape|PortingEventMessagingChangedPayloadShape|PortingEventStatusChangedEventShape|PortingEventNewCommentEventShape|PortingEventSplitEventShape|PortingEventWithoutWebhookShape
 */
final class EventListResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PortingEventDeletedPayload::class,
            PortingEventMessagingChangedPayload::class,
            PortingEventStatusChangedEvent::class,
            PortingEventNewCommentEvent::class,
            PortingEventSplitEvent::class,
            PortingEventWithoutWebhook::class,
        ];
    }
}
