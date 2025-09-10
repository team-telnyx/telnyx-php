<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\StreamingFailedWebhookEvent\Data;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case STREAMING_FAILED = 'streaming.failed';
}
