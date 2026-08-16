<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\SessionStatusChangedWebhookEvent;

/**
 * Event type.
 */
enum Event: string
{
    case SESSION_STATUS_CHANGED = 'session.status_changed';
}
