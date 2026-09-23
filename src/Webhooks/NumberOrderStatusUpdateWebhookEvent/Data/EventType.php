<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Data;

/**
 * The type of event being sent.
 */
enum EventType: string
{
    case NUMBER_ORDER_COMPLETE = 'number_order.complete';
}
