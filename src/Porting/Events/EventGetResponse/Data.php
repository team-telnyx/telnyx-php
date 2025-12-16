<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventStatusChangedEvent;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventWithoutWebhook;

/**
 * @phpstan-import-type PortingEventDeletedPayloadShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventDeletedPayload
 * @phpstan-import-type PortingEventMessagingChangedPayloadShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload
 * @phpstan-import-type PortingEventStatusChangedEventShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventStatusChangedEvent
 * @phpstan-import-type PortingEventNewCommentEventShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventNewCommentEvent
 * @phpstan-import-type PortingEventSplitEventShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventSplitEvent
 * @phpstan-import-type PortingEventWithoutWebhookShape from \Telnyx\Porting\Events\EventGetResponse\Data\PortingEventWithoutWebhook
 *
 * @phpstan-type DataShape = PortingEventDeletedPayloadShape|PortingEventMessagingChangedPayloadShape|PortingEventStatusChangedEventShape|PortingEventNewCommentEventShape|PortingEventSplitEventShape|PortingEventWithoutWebhookShape
 */
final class Data implements ConverterSource
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
