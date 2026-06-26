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

    public static function discriminator(): string
    {
        return 'eventType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PortingEventWithoutWebhook::class,
            'porting_order.deleted' => PortingEventDeletedPayload::class,
            'porting_order.messaging_changed' => PortingEventMessagingChangedPayload::class,
            'porting_order.status_changed' => PortingEventStatusChangedEvent::class,
            'porting_order.new_comment' => PortingEventNewCommentEvent::class,
            'porting_order.split' => PortingEventSplitEvent::class,
        ];
    }
}
