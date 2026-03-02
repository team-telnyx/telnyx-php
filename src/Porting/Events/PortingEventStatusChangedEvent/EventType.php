<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventStatusChangedEvent;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_STATUS_CHANGED = 'porting_order.status_changed';
}
