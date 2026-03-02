<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\PortingEventWithoutWebhook;

/**
 * Identifies the event type.
 */
enum EventType: string
{
    case PORTING_ORDER_LOA_UPDATED = 'porting_order.loa_updated';

    case PORTING_ORDER_SHARING_TOKEN_EXPIRED = 'porting_order.sharing_token_expired';
}
