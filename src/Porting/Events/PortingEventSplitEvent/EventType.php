<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventSplitEvent;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_SPLIT = 'porting_order.split';
}
