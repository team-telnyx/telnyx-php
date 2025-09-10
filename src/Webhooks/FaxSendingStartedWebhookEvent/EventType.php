<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\FaxSendingStartedWebhookEvent;

/**
 * The type of event being delivered.
 */
enum EventType: string
{
    case FAX_SENDING_STARTED = 'fax.sending.started';
}
