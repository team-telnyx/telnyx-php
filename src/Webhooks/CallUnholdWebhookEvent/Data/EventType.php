<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallUnholdWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_UNHOLD = 'call.unhold';
}
