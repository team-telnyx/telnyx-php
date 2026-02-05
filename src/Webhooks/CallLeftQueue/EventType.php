<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallLeftQueue;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_DEQUEUED = 'call.dequeued';
}
