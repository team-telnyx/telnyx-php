<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallEnqueued;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case CALL_ENQUEUED = 'call.enqueued';
}
