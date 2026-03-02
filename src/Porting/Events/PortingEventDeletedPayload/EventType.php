<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventDeletedPayload;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_DELETED = 'porting_order.deleted';
}
