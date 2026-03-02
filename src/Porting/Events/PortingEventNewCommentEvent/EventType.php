<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventNewCommentEvent;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_NEW_COMMENT = 'porting_order.new_comment';
}
