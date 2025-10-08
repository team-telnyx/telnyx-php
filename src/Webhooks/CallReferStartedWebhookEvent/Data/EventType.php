<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallReferStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_REFER_STARTED = 'call.refer.started';
}
