<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingStoppedWebhookEvent\Data1;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case STREAMING_STOPPED = 'streaming.stopped';
}
