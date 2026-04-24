<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallHoldWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_HOLD = 'call.hold';
}
