<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\StreamingStoppedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case STREAMING_STOPPED = 'streaming.stopped';
}
