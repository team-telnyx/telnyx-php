<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallCostWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_COST = 'call.cost';
}
