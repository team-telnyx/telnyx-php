<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventMessagingChangedPayload;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_MESSAGING_CHANGED = 'porting_order.messaging_changed';
}
