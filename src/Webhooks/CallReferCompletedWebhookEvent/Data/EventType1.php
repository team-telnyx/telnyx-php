<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallReferCompletedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_REFER_COMPLETED = 'call.refer.completed';
}
