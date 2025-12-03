<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallForkStoppedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_FORK_STOPPED = 'call.fork.stopped';
}
