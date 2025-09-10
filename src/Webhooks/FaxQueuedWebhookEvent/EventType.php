<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxQueuedWebhookEvent;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case FAX_QUEUED = 'fax.queued';
}
