<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallForkStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_FORK_STARTED = 'call.fork.started';
}
