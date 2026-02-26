<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventStatusChangedEvent;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_DELETED = 'porting_order.deleted';

    case PORTING_ORDER_LOA_UPDATED = 'porting_order.loa_updated';

    case PORTING_ORDER_MESSAGING_CHANGED = 'porting_order.messaging_changed';

    case PORTING_ORDER_STATUS_CHANGED = 'porting_order.status_changed';

    case PORTING_ORDER_SHARING_TOKEN_EXPIRED = 'porting_order.sharing_token_expired';

    case PORTING_ORDER_NEW_COMMENT = 'porting_order.new_comment';

    case PORTING_ORDER_SPLIT = 'porting_order.split';
}
