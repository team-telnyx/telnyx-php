<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallStreamingStartedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case STREAMING_STARTED = 'streaming.started';
}
